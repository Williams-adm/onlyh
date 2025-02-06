<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EmployeeSeeder::class,
            UserSeeder::class,
            CustomerSeeder::class,
            CategorySeeder::class,
            SupplierSeeder::class,
            DetailSeeder::class,
            ProductSeeder::class,
            DiscountSeeder::class,
            InventorySeeder::class,
            TransactionSeeder::class,
            DetailTransactionSeeder::class,
            PaymentMethodSeeder::class,
        ]);
    }
}
