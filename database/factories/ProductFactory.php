<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'price'=>fake()->randomNumber(4),
            'category_id'=>fake()->numberBetween(1,6),
            'status'=>fake()->numberBetween(0,1),
            'is_favourite'=>fake()->numberBetween(0,1)
        ];
    }
}
