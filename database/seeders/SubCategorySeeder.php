<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();
        $subCategories1 = ['Esculturas', 'Vasijas'];
        $subCategories3 = ['Sillas', 'Sofas'];

        foreach($subCategories1 as $subCategory1){
            SubCategory::create([
                'name' => strtolower($subCategory1),
                'description' => $faker->text(100),
                'category_id' => 1
            ]);
        }
        SubCategory::create([
            'name' => strtolower('Lamparas'),
            'description' => $faker->text(100),
            'category_id' => 2
        ]);
        foreach ($subCategories3 as $subCategory3) {
            SubCategory::create([
                'name' => strtolower($subCategory3),
                'description' => $faker->text(100),
                'category_id' => 3
            ]);
        }
    }
}