<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class AdminUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $userAdmin = User::create([
            'name'  => 'Admin Camelia Metal',
            'employeeId' => '000000000001',
            'password'  => bcrypt('12345678'),
            'api_token' => Str::random(80),
            'email_verified_at' => now()
        ]);

        $userAdmin->assignRole('admin');

        $user = User::create([
            'name'  => 'User Camelia Metal',
            'employeeId' => '000000000002',
            'password'  => bcrypt('12345678'),
            'api_token' => Str::random(80),
            'email_verified_at' => now()
        ]);

        $user->assignRole('user');
    }
}
