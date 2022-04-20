<?php

namespace Database\Factories;

use App\Models\Carrier;
use App\Models\Quote;
use App\Models\Tariff;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class QuoteDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quote_id' => $this->faker->randomElement(Quote::pluck('id')),
            'carrier_id' => $this->faker->randomElement(Carrier::pluck('id')),
            'tariff_id' => $this->faker->randomElement(Tariff::pluck('id')),
            'quote_detail_id' => $this->faker->randomNumber(7, true),
            'quote_number' => $this->faker->randomNumber(8, true),
            'base_charge' => $this->faker->randomFloat(2),
            'net_charge' => $this->faker->randomFloat(2),
            'transit_time' => $this->faker->randomDigitNotNull(),
            'origin_phone' => $this->faker->phoneNumber(),
            'dest_phone' => $this->faker->phoneNumber(),
            'message' => $this->faker->optional()->text,
        ];
    }
}
