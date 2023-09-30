<?php

namespace Database\Factories;

use Faker\Core\Uuid;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Quiz>
 */
class QuizFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quiz = [];
        for ($i = 0; $i < 2; $i++) {
            $quiz[$i] = [
                'id' => $this->faker->uuid(),
                'question' => $this->faker->sentence($this->faker->numberBetween(4,12)),
                'options' => [
                    'A' => ['id' => $this->faker->uuid(), 'is_checked' => false, 'option' => $this->faker->word, 'is_correct' => 1],
                    'B' => ['id' => $this->faker->uuid(), 'is_checked' => false, 'option' => $this->faker->word, 'is_correct' => 0],
                    'C' => ['id' => $this->faker->uuid(), 'is_checked' => false, 'option' => $this->faker->word, 'is_correct' => 0],
                    'D' => ['id' => $this->faker->uuid(), 'is_checked' => false, 'option' => $this->faker->word, 'is_correct' => 0],
                ],
                'answer' => 'A',
                'time' => '60',
            ];
        }
        return [
            'title' => $this->faker->sentence,
            'quiz' => json_encode($quiz),
            'time_limit'=>$this->faker->numberBetween(5,20),
        ];
    }
}
