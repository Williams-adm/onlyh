<?php

namespace Database\Seeders;

use App\Models\Discount;
use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Inventory::factory(20)->create();

        $inventories = Inventory::all();
        $discounts = Discount::all();

        /* Rellenado de la tabla discount_inventory */
        $inventories->each(function ($inventory) use ($discounts) {
            $randomDiscounts = $discounts->random();
            $inventory->discounts()->attach($randomDiscounts->id);
        });
    }
}