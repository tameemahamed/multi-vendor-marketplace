<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SearchHistoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=0;$i<400;$i++) {
            $user_id = rand(7, 36);
            $product_id = rand(1, 245);
            $already_exists = DB::table('user_search_histories')
                ->where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->exists();
        
            if($already_exists) continue;

            DB::table('user_search_histories')->insert([
                'user_id' => $user_id,
                'product_id' => $product_id
            ]);
        }
    }
}
