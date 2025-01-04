<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Inventory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantity = 1;
        DetailTransaction::create([
            'quantity' => $quantity,
            'inventory_id' => 1,
            'transaction_id' => 3
        ]);

        $stock = Inventory::find(1)->current_stock;
        $stockMod = $stock - $quantity;
        Inventory::find(1)->update(['current_stock' => $stockMod]);
    }
}
