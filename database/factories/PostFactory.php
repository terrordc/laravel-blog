<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;
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
        return[
            'title' => fake()->realTextBetween($minNbChars = 30, $maxNbChars = 120, $indexSize = 2),
            'body' => fake()->realTextBetween($minNbChars = 200, $maxNbChars = 1000, $indexSize = 2),
            'slug' => \Illuminate\Support\Str::slug(fake()->realTextBetween($minNbChars = 30, $maxNbChars = 120, $indexSize = 2), '-'),
            'likes' => fake()->randomNumber(4, false),
            'user_id' => rand(1,10),
    ];
    }
    
}
