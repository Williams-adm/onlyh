<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = ['Tarjeta', 'billetera digital'];
        foreach ($methods as $method) {
            PaymentMethod::create([
                'name_method' => strtolower($method)
            ]);
        }
    }
}