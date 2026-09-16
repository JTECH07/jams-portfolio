<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

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
