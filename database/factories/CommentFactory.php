<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'article_id' => rand(1, 20),
            'user_id' => rand(1, 10),
            'body' => $this->faker->paragraph(),
        ];
    }
}
