<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $methods = ['Envio a domicilio', 'Recojo en tienda'];
        foreach($methods as $method){
            ShippingMethod::create([
                'method_name' => strtolower($method),
            ]);
        }
    }
}