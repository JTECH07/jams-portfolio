<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'proposal' => fake()->randomElement(['Freelance', 'Stage', 'CDI', 'Collaboration']),
            'subject' => fake()->sentence(),
            'collab_items' => [fake()->randomElement(['Site web', 'App mobile', 'UI/UX'])],
            'message' => fake()->paragraph(),
        ];
    }
}
