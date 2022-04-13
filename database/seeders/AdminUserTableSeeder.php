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
            'email' => 'admin@camelia.com',
            'password'  => bcrypt('12345678'),
            'api_token' => Str::random(80),
            'email_verified_at' => now()
        ]);

        $userAdmin->assignRole('admin');

        $userAdmin = User::create([
            'name'  => 'User Camelia Metal',
            'email' => 'user@camelia.com',
            'password'  => bcrypt('12345678'),
            'api_token' => Str::random(80),
            'email_verified_at' => now()
        ]);

        $userAdmin->assignRole('user');
    }
}
