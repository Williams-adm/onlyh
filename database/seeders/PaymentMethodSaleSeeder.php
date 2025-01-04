<?php

namespace Database\Seeders;

use App\Models\PaymentMethodSale;
use App\Models\Sale;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentMethodSaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sales = Sale::all()->pluck('id')->toArray();
        foreach ($sales as $sale) {
            PaymentMethodSale::create([
                'quantity' => Sale::find($sale)->total,
                'sale_id' => $sale,
                'payment_method_id' => $sale
            ]);
        }
    }
}
