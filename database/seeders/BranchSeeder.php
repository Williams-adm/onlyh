<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Branch;
use App\Models\Phone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'name' => strtolower('sucursal Principal'),
            'contact' => strtolower('principal@gmail.com'),
        ]);

        Address::factory(1)->create([
            'addressable_id' => 1,
            'addressable_type' => Branch::class
        ]);

        Phone::factory(1)->create([
            'phoneable_id' => 1,
            'phoneable_type' => Branch::class
        ]);
    }
}
