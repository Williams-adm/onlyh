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
        $categories = ['Adornos', 'Iluminación', 'Muebles'];

        foreach($categories as $category){
            Category::create([
                'name' => strtolower($category),
                'description' => $faker->text(100)
            ]);
        }
    }
}