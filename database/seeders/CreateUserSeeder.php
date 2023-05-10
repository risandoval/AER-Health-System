<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'User',
                'email' => 'user@yahoo.com',
                'password' => bcrypt('123'),
                'role' => 0

            ],
            [
                'name' => 'Editor',
                'email' => 'editor@yahoo.com',
                'password' => bcrypt('123'),
                'role' => 1

            ],
            [
                'name' => 'Admin',
                'email' => 'Admin@yahoo.com',
                'password' => bcrypt('123'),
                'role' => 2

            ]

            ];
            foreach($users as $user){
                User::create($user);
            }
    }
}
