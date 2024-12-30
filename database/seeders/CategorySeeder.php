<?php

namespace Database\Seeders;

use App\Models\Category;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        Category::create([
            'name' => strtolower('Luminaria'),
            'description' => $faker->text(100)
        ]);
        Category::create([
            'name' => strtolower('Adornos'),
            'description' => $faker->text(100)
        ]);
        Category::create([
            'name' => strtolower('Sofas'),
            'description' => $faker->text(100)
        ]);
        Category::create([
            'name' => strtolower('Juegos de Comedor'),
            'description' => $faker->text(100)
        ]);
    }
}
