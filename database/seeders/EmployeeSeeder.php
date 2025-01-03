<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\DocumentType;
use App\Models\Employee;
use App\Models\EmployeeDocument;
use App\Models\Image;
use App\Models\Note;
use App\Models\Phone;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::create([
            'name' => strtolower('elmo'),
            'paternal_surname' => strtolower('lujan'),
            'maternal_surname' => strtolower('carrion'),
            'date_of_birth' => '2000-05-18',
            'salary' => '1500.00',
            'payment_date' => strtolower('semanal')
        ]);

        Employee::factory(5)->create();
        EmployeeDocument::factory(18)->create();

        $employees = Employee::all();
        foreach ($employees as $employeeAddress) {
            Address::factory(1)->create([
                'addressable_id' => $employeeAddress->id,
                'addressable_type' => Employee::class
            ]);
        }

        foreach ($employees as $employeeDocumentType) {
            DocumentType::factory(1)->create([
                'documentable_id' => $employeeDocumentType,
                'documentable_type' => Employee::class
            ]);
        }

        foreach ($employees as $employee) {
            Image::factory()
            ->configureImage('EmployeesImg', "{$employee->name} {$employee->paternal_surname} {$employee->maternal_surname}")
            ->create([
                'imageable_id' => $employee->id,
                'imageable_type' => Employee::class,
            ]);
        }

        foreach ($employees as $employeeNote) {
            Note::factory(1)->create([
                'noteable_id' => $employeeNote->id,
                'noteable_type' => Employee::class
            ]);
        }

        foreach ($employees as $employeePhones) {
            Phone::factory(1)->create([
                'phoneable_id' => $employeePhones,
                'phoneable_type' => Employee::class
            ]);
        }
    }
}