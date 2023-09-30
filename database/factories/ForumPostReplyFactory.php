<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForumPostReply>
 */
class ForumPostReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'body'=> $this->faker->sentence(3),
            'post_id'=>$this->faker->numberBetween(100,110),
            'user_id'=>$this->faker->numberBetween(1,11),
            'likes_count' => $this->faker->numberBetween(0, 1000),


        ];
    }
}
