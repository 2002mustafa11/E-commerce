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
        'name' => $this->faker->name,
        'image' => 'product-'.$this->faker->numberBetween(1, 12).'.jpg',
        'description' => $this->faker->paragraph,
        'category_id' => $this->faker->numberBetween(1, 10),
        'regular_price' => $this->faker->randomFloat(1, 10, 100),
        'discount_price' => $this->faker->randomFloat(1, 1, 50),
        'quantity' => $this->faker->numberBetween(1, 100),
    ];
}
}
