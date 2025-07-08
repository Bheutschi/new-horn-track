<?php

namespace Database\Factories;

use App\Models\Computer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Loan>
 */
class LoanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->random()->id,
            'computer_id' => Computer::all()->random()->id,
            'start_at' => now(),
            'end_at' => now()->addHours(2),
            'return_status' => $this->faker->randomElement(['Ok', 'Quelques marques', 'Cassé']),
            'loaner_id' => User::all()->random()->id,
        ];
    }
}
