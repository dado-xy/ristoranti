<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrderProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $products = Product::all('id');
        $orders = Order::all('id');

        return [
            'order_id' => $this->faker->randomElement($orders),
            'product_id' => $this->faker->randomElement($products)
        ];
    }
}
