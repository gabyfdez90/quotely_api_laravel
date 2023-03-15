<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quote>
 */
class QuoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'text' => $this->faker->paragraph(),
            'author_ID' => $this->faker->numberBetween(1, 10),
            'book_ID' => $this->faker->numberBetween(1, 10),
            'genre_ID' => $this->faker->numberBetween(1, 10),
        ];
    }
}
