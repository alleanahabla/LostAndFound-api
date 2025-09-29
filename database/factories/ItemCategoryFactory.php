<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ItemCategory>
 */
class ItemCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $categories = [
            'bags' => ['handbag', 'backpack', 'tote', 'duffel bag'],
            'electronics' => ['laptop', 'phone', 'tablet', 'headphones'],
            'clothing' => ['shirt', 'jacket', 'pants', 'hat'],
            'stationery' => ['notebook', 'pen', 'marker', 'folder', 'calculator', 'books'],
            'accessories' => ['watch', 'belt', 'scarf', 'sunglasses'],
            'valuable' => ['jewelry', 'wallet', 'id card'],
            'motorcycle gear and accessories' => ['helmet', 'gloves', 'jacket', 'keys'],
            'personal item' => ['medication', 'cosmetics', 'diary'],
            'other' => ['miscellaneous item', 'unknown', 'custom object'],
        ];

        $categoryName = Arr::random(array_keys($categories));
        $categoryDescription = Arr::random($categories[$categoryName]);

        return [
            'categoryName' => $categoryName,
            'categoryDescription' => $categoryDescription,
        ];
    }
}