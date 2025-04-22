<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('email', 'adminhmg@gmail.com')->delete();

        // ADMIN
        User::create([
            'name' => 'Admin',
            'email' => 'adminhmg@gmail.com',
            'password' => Hash::make('adminhmg123'),
            'role' => 'admin',
        ]);

        // Karyawan
        User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('karyawan123'),
            'role' => 'employee',
        ]);
    }
}
