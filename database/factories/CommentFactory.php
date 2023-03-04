<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment' => fake()->realTextBetween($minNbChars = 30, $maxNbChars = 120, $indexSize = 2),
            'approved' => true,
            'likes' => fake()->randomNumber(4, false),
            'post_id'=> rand(1,10),
            'user_id' => rand(1,10),
        ];
    }
}
