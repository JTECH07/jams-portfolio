<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => \Illuminate\Support\Str::slug($title),
            'excerpt' => fake()->paragraph(),
            'body' => '<p>' . fake()->paragraphs(3, true) . '</p>',
            'image' => 'code.jpg',
            'category' => fake()->randomElement(['development', 'ia', 'mobile', 'design', 'conseil']),
            'published' => true,
        ];
    }
}
