<?php

namespace Database\Seeders;

use App\Models\Detail;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(10)->create();

        $products = Product::all();

        foreach ($products as $product) {
            Image::factory()
            ->configureImage('ProductsImg', "{$product->name}")
            ->create([
                'imageable_id' => $product->id,
                'imageable_type' => Product::class,
            ]);
        }

        $details = Detail::all();

        // Crear productos y asociar cada uno con los 3 detalles
        $products->each(function ($product) use ($details) {
            // Asociar los detalles con el producto
            $product->details()->attach($details->pluck('id')->toArray());
        });
    }
}
