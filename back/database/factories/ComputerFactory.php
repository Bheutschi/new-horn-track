<?php

namespace Database\Factories;

use App\Models\Computer;
use Illuminate\Database\Eloquent\Factories\Factory;
use Random\RandomException;

/**
 * @extends Factory<Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     * @throws RandomException
     */
    public function definition(): array
    {
        $name = wordwrap(random_int(100000, 999999), 2, '-', true);

        return [
            'id' => $this->faker->uuid(),
            'brand' => $this->faker->word(),
            'model' => $this->faker->word(),
            'available' => $this->faker->boolean(),
            'name' => 'JT-'.$name,
        ];
    }
}
