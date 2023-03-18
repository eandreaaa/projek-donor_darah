<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Admin MEDICARPL',
            'email' => 'rplstaff@gmail.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Dukes MEDICARPL',
            'email' => 'rpldukes@gmail.com',
            'password' => bcrypt('dukes'),
            'role' => 'dukes'
        ]);
    }
}
