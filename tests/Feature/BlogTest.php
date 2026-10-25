<?php

namespace Tests\Feature;

use App\Mail\NewsletterConfirmation;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase;

    public function test_blog_index(): void
    {
        Post::factory()->create(['published' => true]);
        $this->get('/blog')->assertOk()->assertSee('Articles');
    }

    public function test_blog_search(): void
    {
        Post::factory()->create(['title' => 'Laravel Guide', 'published' => true]);
        Post::factory()->create(['title' => 'Flutter Basics', 'published' => true]);

        $this->get('/blog?q=Laravel')->assertOk()->assertSee('Laravel Guide');
    }

    public function test_blog_show(): void
    {
        $post = Post::factory()->create(['slug' => 'test-article', 'published' => true]);
        $this->get('/blog/test-article')->assertOk()->assertSee('test-article');
    }

    public function test_unknown_slug_returns_404(): void
    {
        $this->get('/blog/inconnu')->assertNotFound();
    }

    public function test_subscribe_requires_consent(): void
    {
        $this->post('/blog/subscribe', ['email' => 'new@example.com'])
            ->assertSessionHasErrors('consent');

        $this->assertDatabaseMissing('subscribers', ['email' => 'new@example.com']);
    }

    public function test_subscribe_sends_a_confirmation_link(): void
    {
        Mail::fake();

        $this->post('/blog/subscribe', [
            'email' => 'new@example.com',
            'name' => 'Nouveau',
            'consent' => '1',
        ])->assertRedirect()->assertSessionHas('subscribe_pending');

        $subscriber = Subscriber::where('email', 'new@example.com')->firstOrFail();
        $this->assertFalse($subscriber->active);
        $this->assertNull($subscriber->confirmed_at);

        Mail::assertQueued(NewsletterConfirmation::class, function ($mail) use ($subscriber) {
            return $mail->subscriber->is($subscriber)
                && $mail->hasTo($subscriber->email)
                && str_contains($mail->url, 'signature=');
        });
    }

    public function test_confirmation_activates_the_subscriber(): void
    {
        $subscriber = Subscriber::factory()->create([
            'active' => false,
            'confirmed_at' => null,
        ]);

        $url = URL::temporarySignedRoute(
            'blog.subscribe.confirm',
            now()->addDay(),
            ['subscriber' => $subscriber->id]
        );

        $this->get($url)->assertRedirect()->assertSessionHas('subscribed');

        $subscriber->refresh();
        $this->assertTrue($subscriber->active);
        $this->assertNotNull($subscriber->confirmed_at);
        $this->assertTrue($subscriber->isConfirmed());
    }

    public function test_unsubscribe(): void
    {
        $sub = Subscriber::factory()->create(['active' => true, 'confirmed_at' => now()]);

        $url = URL::temporarySignedRoute(
            'blog.unsubscribe',
            now()->addDay(),
            ['subscriber' => $sub->id]
        );

        $this->get($url)->assertOk()->assertSee('Désabonnement');
    }

    public function test_unsubscribe_confirms(): void
    {
        $sub = Subscriber::factory()->create(['active' => true, 'confirmed_at' => now()]);

        $url = URL::temporarySignedRoute(
            'blog.unsubscribe.post',
            now()->addDay(),
            ['subscriber' => $sub->id]
        );

        $this->post($url)->assertRedirect();
        $this->assertDatabaseHas('subscribers', ['id' => $sub->id, 'active' => false]);
    }

    public function test_unsubscribe_requires_a_valid_signature(): void
    {
        $sub = Subscriber::factory()->create(['active' => true, 'confirmed_at' => now()]);

        $this->get("/unsubscribe/{$sub->id}")->assertStatus(403);
    }
}
