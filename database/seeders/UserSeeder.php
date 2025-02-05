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
        $usersData = [
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'superadmin@mail.com',
                'password' => bcrypt('super'),
                'phone' => '9841235678',
                'dob' => '1995-01-04 00:00:00',
                'gender' => 'm',
                'address' => 'bhaktapur'
            ]
        ];

        User::insert($usersData);
    }
}
