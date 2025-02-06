<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        Discount::create([
            'name' => strtolower('Descuento por otoño'),
            'description' => $faker->text(100),
            'porcentage' => 15,
            'start_date' => '2024-08-20 10:00:00',
            'end_date' => '2024-12-24'
        ]);

        Discount::create([
            'name' => strtolower('Descuento por nuevo cliente'),
            'description' => $faker->text(100),
            'porcentage' => 10,
            'start_date' => '2024-08-20 12:00:00',
            'end_date' => '2024-12-24'
        ]);
    }
}
