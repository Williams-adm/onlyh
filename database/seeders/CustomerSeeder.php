<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Customer;
use App\Models\DocumentType;
use App\Models\Note;
use App\Models\Phone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory(15)->create();

        $customer = Customer::all();

        foreach ($customer as $customerAddress) {
            Address::factory(1)->create([
                'addressable_id' => $customerAddress->id,
                'addressable_type' => Customer::class
            ]);
        }

        foreach ($customer as $customerDocumentType) {
            DocumentType::factory(1)->create([
                'documentable_id' => $customerDocumentType->id,
                'documentable_type' => Customer::class
            ]);
        }
        
        foreach ($customer as $customerNotes) {
            Note::factory(1)->create([
                'noteable_id' => $customerNotes->id,
                'noteable_type' => Customer::class
            ]);
        }
        
        foreach ($customer as $customerPhone) {
            Phone::factory(1)->create([
                'phoneable_id' => $customerPhone->id,
                'phoneable_type' => Customer::class
            ]);
        }
    }
}