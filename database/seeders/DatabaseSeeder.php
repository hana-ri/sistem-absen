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
            'name' => 'admin ku',
            'email' => 'admin@gmail.com',
            'password'=> bcrypt('Ggwp2001'),
            'role' => 'Admin',
            'status' => 1
        ]);
    }
}
