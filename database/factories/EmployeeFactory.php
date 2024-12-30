<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payment_dates = ['Fin de mes', 'Quincenal', 'Semanal'];

        return [
            'name' => strtolower($this->faker->words(2, true)),
            'paternal_surname' => strtolower($this->faker->word()),
            'maternal_surname' => strtolower($this->faker->word()),
            'date_of_birth' => $this->faker->date(),
            'salary' => $this->faker->randomFloat(2, 500, 1500),
            'payment_date' => strtolower($this->faker->randomElement($payment_dates)),
        ];
    }
}