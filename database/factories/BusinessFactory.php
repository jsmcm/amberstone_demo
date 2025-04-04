<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Business>
 */
class BusinessFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(['distributor', 'supplier']),
            'name' => fake()->company,
            'address' => fake()->address,
            'country' => fake()->country,
            'vat_number' => strtoupper(fake()->bothify('VAT###########')), // up to 15 chars
        ];
    }
}
