<?php

namespace Database\Seeders;

use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            TeamSeeder::class,
            PlayerSeeder::class,
        ]);

        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@example.com',
            'gender'   => 'Man',
            'age'      => 1,
            'admin'    => 1,
            'password' => '123456',
        ]);
    }
}
