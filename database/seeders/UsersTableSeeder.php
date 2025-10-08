<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $mobile = '+8801'.rand(3,9).rand(10000000, 99999999);
        User::insert([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'mobile_number' => $mobile,
            'gender' => true,
            'date_of_birth' => fake()->dateTimeBetween('1960-01-01', '2011-12-31'),
            'email_verified_at' => now(),
            'mobile_verified_at' => now(),
            'role_id' => 1,
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10)
        ]);
        for($i=1;$i<6;$i++){
            $mobile = '+8801'.rand(3,9).rand(10000000, 99999999);
            User::insert([
                'name' => fake()->name(),
                'username' => 'seller'.$i,
                'email' => 'seller'.$i.'@seller.com',
                'mobile_number' => $mobile,
                'gender' => rand(false, true),
                'date_of_birth' => fake()->dateTimeBetween('1960-01-01', '2011-12-31'),
                'email_verified_at' => now(),
                'mobile_verified_at' => now(),
                'role_id' => 2,
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10)
            ]);
        }
        User::factory(30)->create();
    }
}
