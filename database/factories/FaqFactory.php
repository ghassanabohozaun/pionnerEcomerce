<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => [
                'en' => 'en | ' . $this->faker->sentence(5) . '?',
                'ar' => 'ar | ' . $this->faker->sentence(5) . '?',
            ],
            'answer' => [
                'en' => 'en | ' . $this->faker->paragraph(3),
                'ar' => 'ar | ' . $this->faker->paragraph(3),
            ],
            'status' => $this->faker->boolean(50),
        ];
    }
}
