<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CommentTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_comment(): void
    {
        $post = Post::factory()->create();

        $this->post('/comment', [
            'author_name' => 'Testeur',
            'body' => 'Super article !',
            'commentable_type' => 'post',
            'commentable_id' => $post->id,
        ])->assertRedirect()->assertSessionHas('commented');

        $this->assertDatabaseHas('comments', ['author_name' => 'Testeur', 'body' => 'Super article !']);
    }

    public function test_comment_honeypot_is_silently_ignored(): void
    {
        $post = Post::factory()->create();

        $this->post('/comment', [
            'author_name' => 'Bot',
            'body' => 'Spam',
            'commentable_type' => 'post',
            'commentable_id' => $post->id,
            'website' => 'https://spam.example',
        ])->assertRedirect()->assertSessionHas('commented');

        $this->assertDatabaseCount('comments', 0);
    }

    public function test_comment_requires_a_name_and_body(): void
    {
        $post = Post::factory()->create();

        $this->post('/comment', [
            'commentable_type' => 'post',
            'commentable_id' => $post->id,
        ])->assertSessionHasErrors(['author_name', 'body']);
    }

    public function test_store_rating(): void
    {
        $post = Post::factory()->create();

        $this->post('/rating', [
            'author_name' => 'Testeur',
            'stars' => 5,
            'rateable_type' => 'post',
            'rateable_id' => $post->id,
        ])->assertRedirect()->assertSessionHas('rated');

        $this->assertDatabaseHas('ratings', ['stars' => 5]);
    }
}
