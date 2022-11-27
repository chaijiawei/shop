<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goods>
 */
class GoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl,
            'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 1, 999),
            'stock' => $this->faker->numberBetween(1, 999),
        ];
    }
}
