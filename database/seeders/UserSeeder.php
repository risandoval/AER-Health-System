<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'H001',
                'first_name' => 'Emilia',
                'middle_name' => 'Clarke',
                'last_name' => 'Herrera',
                'role_id' => '1',
                'role' => 'Admin',
                'position' => 'Head Admin',
                'birthday' => '1999-05-05',
                'contact' => '09123456789',
                'email' => 'admin@gmail.com',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password                
            ],
            [
                'username' => 'C002',
                'first_name' => 'Mayra',
                'middle_name' => 'Cherry',
                'last_name' => 'Cruz',
                'role_id' => '2',
                'role' => 'Barangay Health Worker',
                'barangay' => 'Barangay 1',
                'birthday' => '1969-02-25',
                'contact' => '09987654321',
                'email' => 'bhw@gmail.com',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password                
            ],
            [
                'username' => 'D003',
                'first_name' => 'John',
                'middle_name' => 'Will',
                'last_name' => 'Doe',
                'role_id' => '3',
                'role' => 'Doctor',
                'specialization' => 'Head Doctor',
                'birthday' => '1979-05-24',
                'contact' => '09543219876',
                'email' => 'doctor@gmail.com',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            
        ];
        
        foreach($users as $user){
            User::create($user);
        }
    }
}
