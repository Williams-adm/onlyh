<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DocumentType>
 */
class DocumentTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => strtolower('dni'),
            'number' => $this->faker->unique()->numberBetween(10000000, 99999999)
        ];
    }

    /**
     * Pasar un tipo de doc, diferente al dni
     */
    public function configureDocType(string $type): self
    {
        return $this->state(function (array $attributes) use ($type) {
            return [
                'type' => strtolower($type)
            ];
        });
    }
}