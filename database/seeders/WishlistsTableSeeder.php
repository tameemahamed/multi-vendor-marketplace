<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistsTableSeeder extends Seeder
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

            // get a relevant variant_id
            $variantIds = DB::table('product_variants')
                ->where('product_id', $product_id)
                ->pluck('id')
                ->toArray();
            $variant_id = $variantIds[array_rand($variantIds)];
            
            // check if already exists
            $already_exists = DB::table('wishlists')
                ->where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('variant_id', $variant_id)
                ->exists();
        
            if($already_exists) continue;

            DB::table('wishlists')->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'variant_id' =>$variant_id
            ]);
        }
    }
}
