<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'username' => 'H0001',
                'first_name' => 'Emilia',
                'middle_name' => 'Clarke',
                'last_name' => 'Herrera',
                'role_id' => '1',
                'role' => 'Admin',
                'birthday' => '1999-05-05',
                'contact' => '09123456789',
                'email' => 'adminemelia@gmail.com',
                'profile_picture' => 'default-profile.jpg',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password                
            ],

            [
                'username' => 'O0002',
                'first_name' => 'Stacey',
                'middle_name' => '',
                'last_name' => 'Owens',
                'role_id' => '1',
                'role' => 'Admin',
                'birthday' => '1996-01-23',
                'contact' => '09123456789',
                'email' => 'adminstacey@gmail.com',
                'profile_picture' => 'default-profile.jpg',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password                
            ],
            [
                'username' => 'C0003',
                'first_name' => 'Mayra',
                'middle_name' => 'Cherry',
                'last_name' => 'Cruz',
                'role' => 'Barangay Health Worker',
                'barangay' => 'Barangay 1',
                'birthday' => '1969-02-25',
                'contact' => '09987654321',
                'email' => 'bhw@gmail.com',
                'profile_picture' => 'default-profile.jpg',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password                
            ],
            [
                'username' => 'D0004',
                'first_name' => 'John',
                'middle_name' => 'Will',
                'last_name' => 'Doe',
                'role_id' => '3',
                'role' => 'Doctor',
                'specialization' => 'Head Doctor',
                'birthday' => '1979-05-24',
                'contact' => '09543219876',
                'email' => 'doctor@gmail.com',
                'profile_picture' => 'default-profile.jpg',
                'status' => 'Active',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ],
            
        ];
        
        foreach($users as $user){
            User::create($user);
        }
    }
}
