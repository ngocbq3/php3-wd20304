<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(25),
            'description' => fake()->text(30),
            'content'   => fake()->paragraph(),
            'image'     => fake()->imageUrl(),
            'view'      => rand(1, 1000),
            'category_id'   => rand(1, 4)
        ];
    }
}
