<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employees;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::create([
            'name' => 'John Doe',
            'nip' => '123456',
            'email' => 'johndoe@example.com',
            'division' => 'IT',
            'period' => 'Q1 2025',
            'status' => 'completed',
            'evaluation_date' => '2025-04-20',
            'photo' => null,
        ]);

        Employees::create([
            'name' => 'Jane Smith',
            'nip' => '654321',
            'email' => 'janesmith@example.com',
            'division' => 'HR',
            'period' => 'Q1 2025',
            'status' => 'pending',
            'evaluation_date' => null,
            'photo' => null,
        ]);
    }
}
