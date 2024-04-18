<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'admin',
            'email'=> 'admin@gmail.com',
            'password'=> bcrypt('12345'),
            'role' => 'admin',
        ]);
        
        User::create([
            'nama' => 'kasir',
            'email'=> 'kasir@gmail.com',
            'password'=> bcrypt('12345'),
            'role' => 'petugas',
        ]);
    }
}
