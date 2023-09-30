<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Topic>
 */
class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
             'title' => $this->faker->sentence,
            'body' => $this->faker->paragraph(5),
            //'likes_count' => $this->faker->numberBetween(0, 1000),
            'categories'=> json_encode($this->faker->words(2))
        ];
    }
}
