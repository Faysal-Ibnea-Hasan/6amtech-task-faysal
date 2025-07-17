<?php

namespace Database\Factories;

use App\Models\Category;
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
            'category_id' => Category::inRandomOrder()->first()->id ?? Category::factory()->create()->id,
            'name' => $this->faker->unique()->words(2, true) . ' Product',
            'description' => $this->faker->paragraph(),
            'price' => $this->faker->randomFloat(2, 10, 50000),
            'stock_quantity' => $this->faker->numberBetween(0, 1500)
        ];
    }
}
