<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Admin Seeder
        $admin = User::create([
            'name' => 'Admin Admin',
            'website' => 'https://laravel.com',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

         $admin->assignRole('Admin');
    
         // Sales Seeder

          $admin = User::create([
            'name' => 'Sales Sales',
            'website' => 'https://laravel.com',
            'email' => 'sales@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

         $admin->assignRole('Sales');

         // Back Office Seeder 

          $admin = User::create([
            'name' => 'Back Office',
            'website' => 'https://laravel.com',
            'email' => 'backoffice@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);

         $admin->assignRole('Back Office');


    }
}
