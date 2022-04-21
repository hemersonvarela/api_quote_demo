<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class TariffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'owner' => $this->faker->name,
            'account_number' => $this->faker->numerify('acc-####'),
            'description' => $this->faker->optional()->text(),
        ];
    }
}
