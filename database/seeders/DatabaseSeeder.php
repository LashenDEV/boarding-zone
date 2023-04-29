<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\user::factory(10)->create();

        // \App\Models\user::factory()->create([
        //     'name' => 'Test user',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            UserSeeder::class,
        ]);
    }
}
