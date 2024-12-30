<?php

namespace Database\Seeders;

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

        User::create([
            'user_name' => strtolower($employee->name . '32415'),
            'password' => Hash::make('admin12R'),
            'employee_id' => 1,
        ]);

        User::factory(5)->create();
    }
}