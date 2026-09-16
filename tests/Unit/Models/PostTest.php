<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_has_expected_fillable(): void
    {
        $post = new Post();
        $this->assertEquals(
            ['title', 'slug', 'excerpt', 'body', 'image', 'category', 'published'],
            $post->getFillable()
        );
    }

    public function test_scope_published_returns_only_published(): void
    {
        Post::factory()->create(['published' => true]);
        Post::factory()->create(['published' => false]);

        $this->assertCount(1, Post::published()->get());
    }

    public function test_avg_rating_returns_zero_when_no_ratings(): void
    {
        $post = Post::factory()->create();
        $this->assertEquals(0, $post->avgRating());
    }

    public function test_avg_rating_returns_correct_average(): void
    {
        $post = Post::factory()->create();
        Rating::factory()->create(['rateable_id' => $post->id, 'stars' => 4]);
        Rating::factory()->create(['rateable_id' => $post->id, 'stars' => 2]);
        $this->assertEquals(3.0, $post->avgRating());
    }

    public function test_total_comments_count(): void
    {
        $post = Post::factory()->create();
        Comment::factory()->create(['commentable_id' => $post->id]);
        Comment::factory()->create(['commentable_id' => $post->id]);
        $this->assertEquals(2, $post->totalComments());
    }
}
