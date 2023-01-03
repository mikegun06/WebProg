<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = ['Indonesia', 'Malaysia', 'Singapore', 'Thailand', 'Laos', 'Vietnam'];
        $gender = ['Male', 'Female'];
            DB::table('users')->insert(
            [
                'name' => "Admin1",
                'email' => "admin1@gmail.com",
                'password' => Hash::make("admin1"),
                'gender' => "Male",
                'dob' => date('Y-m-d'),
                'country' => $country[rand(0,5)],
                'isAdmin' => true
            ]);
            DB::table('users')->insert(
            [
                'name' => "Admin2",
                'email' => "admin2@gmail.com",
                'password' => Hash::make("admin2"),
                'gender' => "Female",
                'dob' => date('Y-m-d'),
                'country' => $country[rand(0,5)],
                'isAdmin' => true
            ]);

        for($a=1;$a<=5;$a++){ 
            DB::table('users')->insert([
                'name' => "User$a",
                'email' => "user$a@gmail.com",
                'password' => Hash::make("user$a"),
                'gender' => $gender[rand(0,1)],
                'dob' => date('Y-m-d'),
                'country' => $country[rand(0,5)],
                'isAdmin' => false
            ]);
        }
    }
}
