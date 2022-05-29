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
    public function definition()
    {
        return [
            'jsonbdata' => [
                'title' => $this->faker->realText(10),
                'author' => $this->faker->name(),
                'body' => $this->faker->realTextBetween(20, 150)
            ]
        ];
    }
}
