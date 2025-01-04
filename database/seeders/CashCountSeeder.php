<?php

namespace Database\Seeders;

use App\Models\CashCount;
use App\Models\Sale;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CashCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        $totalSale = Sale::sum('total');
        CashCount::create([
            'code' => $faker->unique()->randomNumber(),
            'total_sale' => $totalSale,
            'total_income' => 0,
            'total_outflow' => 0,
            'total_cash' => $totalSale,
            'path' => "actualizar",
            'branch_id' => 1,
        ]);

        $sale = Sale::all()->pluck('id')->toArray();
        foreach ($sale as $sales) {
            $saleID = Sale::find($sales);
            $saleID->update([
                'cash_count_id' => 1
            ]);
        }
    }
}
