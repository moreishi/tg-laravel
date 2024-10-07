<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

        $price = rand(100, 10000) / 100;

        $taxonomy = [
            "beauty",
            "fragrances",
            "furniture",
            "groceries",
            "home-decoration",
            "kitchen-accessories",
            "laptops",
            "mens-shirts",
            "mens-shoes",
            "mens-watches",
            "mobile-accessories",
            "motorcycle",
            "skin-care",
            "smartphones",
            "sports-accessories",
            "sunglasses",
            "tablets",
            "tops",
            "vehicle",
            "womens-bags",
            "womens-dresses",
            "womens-jewellery",
            "womens-shoes",
            "womens-watches"
        ];

        return [
            'title' =>  fake()->sentence(),
            'description' => fake()->paragraph(2),
            'price' => $price,
            'category' => $taxonomy[rand(0, count($taxonomy) - 1)]
        ];
    }
}
