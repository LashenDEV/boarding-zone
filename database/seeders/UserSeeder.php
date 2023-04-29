<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Super Admin',
            'email' => 'sadmin@demo.com',
            'password' => Hash::make('12345678'),
            'userType' => 'SADM',
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@demo.com',
            'password' => Hash::make('12345678'),
            'userType' => 'ADM',
        ]);

        User::create([
            'name' => 'Boarding Owner',
            'email' => 'bowner@demo.com',
            'password' => Hash::make('12345678'),
            'userType' => 'BOR',
        ]);

        User::create([
            'name' => 'Client',
            'email' => 'client@demo.com',
            'password' => Hash::make('12345678'),
            'userType' => 'CLNT',
        ]);
    }
}
