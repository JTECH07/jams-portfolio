<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private function actingAsAdmin(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    public function test_admin_requires_auth(): void
    {
        $this->get('/admin')->assertRedirect('/login');
    }

    public function test_admin_dashboard(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin')->assertOk()->assertSee('Tableau de bord');
    }

    public function test_admin_posts_page(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin/posts')->assertOk()->assertSee('Articles');
    }

    public function test_admin_create_post_form(): void
    {
        $this->actingAsAdmin();
        $this->get('/admin/posts/create')->assertOk()->assertSee('Nouvel article');
    }

    public function test_login_page(): void
    {
        $this->get('/login')->assertOk()->assertSee('Connexion');
    }

    public function test_post_body_is_sanitized_before_storage(): void
    {
        $this->actingAsAdmin();

        $this->post(route('admin.posts.store'), [
            'title' => 'Article malveillant',
            'excerpt' => 'Résumé',
            'body' => '<p onclick="alert(1)">Bonjour<script>alert(1)</script><a href="javascript:alert(1)">lien</a></p>',
            'category' => 'development',
        ])->assertRedirect(route('admin.posts'));

        $post = Post::where('title', 'Article malveillant')->firstOrFail();
        $this->assertStringNotContainsString('<script', $post->body);
        $this->assertStringNotContainsString('onclick', $post->body);
        $this->assertStringNotContainsString('javascript:', $post->body);
    }

    public function test_changing_slug_creates_a_301_redirect(): void
    {
        $this->actingAsAdmin();
        $post = Post::factory()->create(['slug' => 'ancien-slug', 'published' => true]);

        $this->put(route('admin.posts.update', $post), [
            'title' => $post->title,
            'slug' => 'nouveau-slug',
            'excerpt' => $post->excerpt,
            'body' => $post->body,
            'category' => $post->category,
            'published' => '1',
        ])->assertRedirect(route('admin.posts'));

        $this->assertDatabaseHas('post_redirects', ['slug' => 'ancien-slug', 'post_id' => $post->id]);
        $this->get('/blog/ancien-slug')->assertRedirect('/blog/nouveau-slug');
        $this->assertSame(301, $this->get('/blog/ancien-slug')->status());
    }

    public function test_future_post_is_hidden_until_its_publication_date(): void
    {
        $this->actingAsAdmin();
        $post = Post::factory()->create([
            'slug' => 'planifie',
            'published' => true,
            'published_at' => now()->addDays(2),
        ]);

        $this->actingAs(User::factory()->create());

        $this->get('/blog/planifie')->assertOk();

        auth()->logout();
        $this->get('/blog/planifie')->assertNotFound();

        $this->travelTo(now()->addDays(3));
        $this->get('/blog/planifie')->assertOk();
    }

    public function test_admin_can_change_password(): void
    {
        $user = User::factory()->create(['password' => Hash::make('old-password')]);
        $this->actingAs($user);

        $this->put(route('admin.password.update'), [
            'current_password' => 'old-password',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])->assertRedirect(route('admin.password.edit'));

        $this->assertTrue(Hash::check('new-password-123', $user->refresh()->password));
    }

    public function test_password_change_rejects_wrong_current_password(): void
    {
        $this->actingAs(User::factory()->create(['password' => Hash::make('old-password')]));

        $this->put(route('admin.password.update'), [
            'current_password' => 'wrong-password',
            'password' => 'new-password-123',
            'password_confirmation' => 'new-password-123',
        ])->assertSessionHasErrors('current_password');
    }
}
