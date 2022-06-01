<?php

namespace Database\Factories;

use App\Models\Partner;
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
    public function definition()
    {
        $partners = Partner::all('id');

        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'price' => $this->faker->numberBetween(1,100),
            'partner_id' => $this->faker->randomElement($partners)
        ];
    }
}
