<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Riza Hana',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt(env('seedPWD')),
            'role' => 'Admin',
            'status' => 1
        ]);

        User::create([
            'name' => 'Jeanne',
            'email' => 'staff@gmail.com',
            'password'=> bcrypt(env('seedPWD')),
            'role' => 'Staff',
            'status' => 1
        ]);

        User::create([
            'name' => 'Eri',
            'email' => 'user@gmail.com',
            'password'=> bcrypt(env('seedPWD')),
            'role' => 'User',
            'status' => 1
        ]);
    }
}
