<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static $customerIds = [];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $customers = Customer::doesntHave('user')->orderBy('id')->pluck('id');

        if ($customers->isEmpty()) {
            throw new \Exception('No hay clientes disponibles para asociar con un usuario');
        }

        if (empty(self::$customerIds)) {
            self::$customerIds = $customers->toArray();
        }

        $customerId = array_shift(self::$customerIds);

        return [
            'email' => $this->faker->safeEmail(),
            'password' => Hash::make($this->faker->password()),
            'userable_id' => $customerId,
            'userable_type' => Customer::class
        ];
    }
}