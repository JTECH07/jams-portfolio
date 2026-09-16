<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition(): array
    {
        return [
            'author_name' => fake()->name(),
            'author_email' => fake()->safeEmail(),
            'body' => fake()->sentence(),
            'commentable_type' => Post::class,
            'commentable_id' => Post::factory(),
            'approved' => false,
        ];
    }
}
