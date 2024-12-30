<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\DocumentType;
use App\Models\Phone;
use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Supplier::create([
            'type' => 'juridica',
            'business_name' => strtolower('Pepito SAC'),
            'contac' => 'pepito@gmail.com'
        ]);
        Supplier::create([
            'type' => 'juridica',
            'business_name' => strtolower('Fantastic SAC'),
            'contac' => 'fantastic@gmail.com'
        ]);

        $suppliers = Supplier::all();
        foreach ($suppliers as $supplierAddress) {
            Address::factory(1)->create([
                'addressable_id' => $supplierAddress->id,
                'addressable_type' => Supplier::class
            ]);
        }

        foreach ($suppliers as $supplierDocumentType) {
            DocumentType::factory()
            ->configureDocType('ruc')->create([
                'documentable_id' => $supplierDocumentType->id,
                'documentable_type' => Supplier::class
            ]);
        }

        foreach ($suppliers as $supplierPhone) {
            Phone::factory(1)->create([
                'phoneable_id' => $supplierPhone->id,
                'phoneable_type' => Supplier::class
            ]);
        }
    }
}