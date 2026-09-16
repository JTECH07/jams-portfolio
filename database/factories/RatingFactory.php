<?php

namespace Database\Factories;

use App\Models\Rating;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    protected $model = Rating::class;

    public function definition(): array
    {
        return [
            'author_name' => fake()->name(),
            'author_email' => fake()->safeEmail(),
            'stars' => fake()->numberBetween(1, 5),
            'review' => fake()->sentence(),
            'rateable_type' => Post::class,
            'rateable_id' => Post::factory(),
        ];
    }
}
