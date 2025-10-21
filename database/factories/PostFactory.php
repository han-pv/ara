<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $userId = User::inRandomOrder()->first();
        return [
            'user_id' => $userId,
            'content' => fake()->paragraph(),
            'image_path' => null,
            'video_path' => null,
            'view_count' => fake()->numberBetween(0, 1000),
        ];
    }
}
