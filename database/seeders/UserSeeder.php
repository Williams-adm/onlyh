<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employee = Employee::find(1);
        $customer = Customer::find(1);

        User::create([
            'email' => strtolower($employee->name . '15'),
            'password' => Hash::make('admin12R'),
            'userable_id' => $employee->id,
            'userable_type' => Employee::class
        ]);

        User::create([
            'email' => strtolower($customer->name . '32' . '@gmail.com'),
            'password' => Hash::make('user123456'),
            'userable_id' => $customer->id,
            'userable_type' => Customer::class
        ]);

        User::factory(5)->create();
    }
}