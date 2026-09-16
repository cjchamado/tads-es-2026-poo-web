<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $status = fake()->randomElement(['pending', 'cancelled', 'paid']);

        return [
            'customer_id' => Customer::factory(),
            'total' => fake()->randomDigitNotZero(),
            'status' => $status,
            'paid_at' => $status === 'paid' ? fake()->dateTimeBetween(
                startDate: '-5 days',
            ) : null,
        ];
    }
}
