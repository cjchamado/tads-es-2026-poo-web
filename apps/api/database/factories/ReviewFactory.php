<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Product::factory()->create(),
            'customer_id' => Customer::factory()->create(),
            'rating' => fake()->randomElement([1, 2, 3, 4, 5]),
            'comment' => fake()->sentences(asText: true),
        ];
    }
}
