<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $email = fake()->email;
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'name' => fake()->name,
            'email' => $email,
            'phone' => fake()->phoneNumber,
            'subject' => fake()->sentence(5) . ' : ' . $email,
            'message' => fake()->paragraph(10),
            'is_read' => random_int(0, 1),
        ];
    }
}
