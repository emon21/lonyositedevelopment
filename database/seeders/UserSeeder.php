<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        User::insert([

            //admin
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'photo' => 'default.jpg',
                'phone' => '01811287256',
                'address' => 'Dhaka,Bangladesh',
                'role' => 'admin',
                'status' => 'active'
            ],
            
            //user
            [
                'name' => 'User',
                'email' => 'user@mail.com',
                'password' => bcrypt('password'),
                'photo' => 'default.png',
                'phone' => '01611287256',
                'address' => 'Dhaka,Bangladesh',
                'role' => 'user',
                'status' => 'active'
            ],
            

        ]);
    }
}
