<?php

namespace Database\Factories;

use App\Models\SubCategory;
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
        $subCategory = SubCategory::all()->pluck('id')->toArray();

        return [
            'name' => strtolower($this->faker->unique()->words(2, true)),
            'code' => $this->faker->unique()->ean8(),
            'description' => $this->faker->text(150),
            'usage_recomendation' => $this->faker->text(100),
            'additional_features' => $this->faker->text(100),
            'sub_category_id' => $this->faker->randomElement($subCategory),
        ];
    }
}
