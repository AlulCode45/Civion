<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NewsComment>
 */
class NewsCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'news_id' =>  News::inRandomOrder()->value('id') ?? User::factory(),
            'user_id' =>  User::inRandomOrder()->value('id') ?? User::factory(),
            'comment' => $this->faker->realText(),
        ];
    }
}
