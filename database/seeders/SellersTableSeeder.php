<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($user_id=2; $user_id<=6; $user_id++){
            DB::table('sellers')->insert([
                'user_id' => $user_id,
                'business_name' => fake()->company(),
                'description' => fake()->paragraph(3),
            ]);
        }
    }
}
