<?php

namespace Tests\Unit\Models;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Rating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_has_expected_fillable(): void
    {
        $post = new Post;
        $this->assertEquals(
            ['title', 'slug', 'excerpt', 'body', 'image', 'category', 'published', 'published_at'],
            $post->getFillable()
        );
    }

    public function test_scope_published_returns_only_published(): void
    {
        Post::factory()->create(['published' => true]);
        Post::factory()->create(['published' => false]);

        $this->assertCount(1, Post::published()->get());
    }

    public function test_scope_published_hides_future_posts(): void
    {
        Post::factory()->create(['published' => true, 'published_at' => now()->addDay()]);
        Post::factory()->create(['published' => true, 'published_at' => now()->subDay()]);

        $this->assertCount(1, Post::published()->get());
    }

    public function test_deleting_post_cascades_comments_and_ratings(): void
    {
        $post = Post::factory()->create();
        Comment::factory()->create(['commentable_id' => $post->id]);
        Rating::factory()->create(['rateable_id' => $post->id]);

        $post->delete();

        $this->assertDatabaseCount('comments', 0);
        $this->assertDatabaseCount('ratings', 0);
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
        Comment::factory()->count(2)->create([
            'commentable_id' => $post->id,
            'approved' => true,
        ]);
        Comment::factory()->create([
            'commentable_id' => $post->id,
            'approved' => false,
        ]);
        $this->assertEquals(2, $post->totalComments());
    }
}
