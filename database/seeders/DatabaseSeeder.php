<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        User::updateOrCreate([
            'email' => 'kenne@gmail.com',
        ], [
            'name' => 'kenne',
            'password' => Hash::make('kenne123'),
            'role' => 'admin',
        ]);
        User::updateOrCreate([
            'email' => 'kier@gmail.com',
        ], [
            'name' => 'kier',
            'password' => Hash::make('kier 123'),
            'role' => 'admin',
        ]);
        User::updateOrCreate([
            'email' => 'camposanosiverlyn@gmail.com',
        ], [
            'name' => 'Campos Admin',
            'password' => Hash::make('Xsignjune13'),
            'role' => 'admin',
        ]);
    }
}
