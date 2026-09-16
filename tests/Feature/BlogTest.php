<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Foundation\Testing\RefreshDatabase;

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

    public function test_subscribe(): void
    {
        $this->post('/blog/subscribe', ['email' => 'new@example.com'])
            ->assertRedirect()->assertSessionHas('subscribed');

        $this->assertDatabaseHas('subscribers', ['email' => 'new@example.com']);
    }

    public function test_unsubscribe(): void
    {
        $sub = Subscriber::factory()->create(['active' => true]);
        $this->get("/unsubscribe/{$sub->email}")->assertOk()->assertSee('Désabonnement');
    }

    public function test_unsubscribe_confirms(): void
    {
        $sub = Subscriber::factory()->create(['active' => true]);
        $this->post("/unsubscribe/{$sub->email}")->assertRedirect();
        $this->assertDatabaseHas('subscribers', ['email' => $sub->email, 'active' => false]);
    }
}
