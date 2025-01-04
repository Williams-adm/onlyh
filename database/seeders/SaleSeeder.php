<?php

namespace Database\Seeders;

use App\Models\Sale;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = strtolower('Boleta');
        Sale::create([
            'code' => 'V001',
            'type' => $type,
            'sub_total' => 0.0,
            'igv' => 0.0,
            'total' => 0.0,
            'path' => 'actualizar',
            'customer_id' => 12,
            'employee_id'  => 1,
            'branch_id' => 1
        ]);
        Sale::create([
            'code' => 'V002',
            'type' => $type,
            'sub_total' => 0.0,
            'igv' => 0.0,
            'total' => 0.0,
            'path' => 'actualizar',
            'customer_id' => 5,
            'employee_id'  => 2,
            'branch_id' => 1
        ]);
        Sale::create([
            'code' => 'V003',
            'type' => $type,
            'sub_total' => 0.0,
            'igv' => 0.0,
            'total' => 0.0,
            'path' => 'actualizar',
            'customer_id' => 9,
            'employee_id'  => 3,
            'branch_id' => 1
        ]);

        $sales = Sale::all();
        foreach($sales as $sale){
            $voucherName = 'VoucherSales/' . Str::slug($type . '-' . $sale->code) . '.pdf';
            $options = new Options();
            $options->set('defaultFont', 'Courier');
            $dompdf = new Dompdf($options);
            $content = "<h1>Número de Voucher: " . $sale->code . "</h1><p>Tipo Voucher: " . $type . "</p><p>" .
            "Aqui va el voucher de venta como tal
            " . "</p>";
            $dompdf->loadHtml($content);
            $dompdf->render();
            $output = $dompdf->output();
            Storage::put('public/' . $voucherName, $output);

            $sale->update(['path' => $voucherName]);
        }
    }
}
