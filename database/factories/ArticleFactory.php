<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "user_id" => rand(1, 10),
            "category_id" => rand(1, 3),
            "slug" => $this->faker->slug(2),
            "title" => $this->faker->sentence,
            "excerpt" => $this->faker->paragraph(2),
            "body" => $this->faker->paragraph(6),
        ];
    }
}
