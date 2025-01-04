<?php

namespace Database\Seeders;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected static $supplier_id = [];
    
    public function run(): void
    {
        $operation = strtolower('Compra de productos');
        $numVouchers = ['132987', '7613822'];
        self::$supplier_id = [1, 2];

        foreach($numVouchers as $numVoucher) {
            $supplier_id = array_shift(self::$supplier_id);
            $VoucherName = 'TransactionVouchers/' . Str::slug($operation . '-' . $numVoucher) . '.pdf';

            $options = new Options();
            $options->set('defaultFont', 'Courier');
            $dompdf = new Dompdf($options);
            $content = "<h1>Número de Voucher: " . $numVoucher . "</h1><p>Operación: " . $operation . "</p><p>" .
            "Aqui va los detalles de la compra del voucher" . "</p>";
            $dompdf->loadHtml($content);
            $dompdf->render();
            $output = $dompdf->output();
            Storage::put('public/' . $VoucherName, $output);

            Transaction::create([
                'type' => strtolower('entrada'),
                'operation' => $operation,
                'type_voucher' => strtolower('factura'),
                'num_voucher' => $numVoucher,
                'path_voucher' => $VoucherName,
                'branch_id' => 1,
                'supplier_id' => $supplier_id
            ]);
        }

        DetailTransaction::factory(20)->create();
        $total = DetailTransaction::where('transaction_id', 1)->sum(DB::raw('quantity * purcharse_price'));
        $total2 = DetailTransaction::where('transaction_id', 2)->sum(DB::raw('quantity * purcharse_price'));
        for ($i = 1; $i <= 2; $i++) {
            if ($i == 1) {
                $transaction = Transaction::where('supplier_id', '=', $i)->first();
                $transaction->update(['total' => $total]);
            }
            if ($i == 2) {
                $transaction = Transaction::where('supplier_id', '=', $i)->first();
                $transaction->update(['total' => $total2]);
            }
        }

        Transaction::create([
            'type' => strtolower('salida'),
            'operation' => strtolower('Producto dañado'),
            'reazon' => "El producto no funciona de fabrica",
            'type_voucher' => strtolower('otro'),
            'branch_id' => 1
        ]);
    }
}
