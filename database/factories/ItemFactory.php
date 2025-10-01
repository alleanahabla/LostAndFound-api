<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ItemCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
           $status = $this->faker->randomElement(['lost', 'found']);

    // Set dates based on status
    $dateLost = $status === 'lost' ? $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d') : null;
    $dateFound = $status === 'found' ? $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d') : null;
    $category=ItemCategory::inRandomOrder()->first();

    return [
        'categoryID' => ItemCategory::factory(),
        'description' => ucfirst($this->faker->colorName().''. $category->categoryDescription),
        'campus'      => $this->faker->randomElement(['Sorsogon City Campus', 'Bulan Campus', 'Castilla Campus', 'Magallanes Campus' ]),
        'location'    => $this->faker->randomElement(['Library', 'Canteen', 'Hall', 'Rooms', 'Laboratory']),
        'status'      => $status,
        'dateLost'   => $dateLost,
        'dateFound'  => $dateFound,
        'created_at'  => now(),
        'updated_at'  => now(),
    ]; 

    }
}
