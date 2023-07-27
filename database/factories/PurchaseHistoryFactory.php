<?php

namespace Database\Factories;

use App\Models\PurchaseHistory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseHistory>
 */
class PurchaseHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'item_id' => fake()->uuid(),
        'item_name' => fake()->word() . fake()->word(),
        'quantity' => fake()->numberBetween(1,8), 
        'total_price' => fake()->numberBetween(2500, 60000), 
        'purchase_time'=> fake()->dateTime()];
    }
}
