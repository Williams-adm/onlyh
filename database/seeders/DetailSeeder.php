<?php

namespace Database\Seeders;

use App\Models\Detail;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Detail::create([
            'type' => strtolower('color'),
            'value' => strtolower('rojo')
        ]);
        Detail::create([
            'type' => strtolower('material'),
            'value' => strtolower('ceramica')
        ]);
        Detail::create([
            'type' => strtolower('dimensiones'),
            'value' => strtolower('10x20x30')
        ]);
    }
}