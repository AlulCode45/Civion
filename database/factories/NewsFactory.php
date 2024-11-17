<?php

namespace Database\Factories;

use App\Enums\NewsStatusEnum;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence;

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'body' => $this->faker->paragraphs(5, true),
            'thumbnail' => $this->faker->imageUrl(640, 480, 'news', true, 'Thumbnail'),
            'user_id' => User::inRandomOrder()->value('id') ?? User::factory(),
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory(),
            'status' => $this->faker->randomElement([
                NewsStatusEnum::PUBLISHED->value,
                NewsStatusEnum::DRAFT->value,
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
