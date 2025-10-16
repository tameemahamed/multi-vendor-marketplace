<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=0; $i<350; $i++) {
            $user_id = rand(7, 36);
            $product_id = rand(1, 245);

            // get a relevant variant_id
            $variantIds = DB::table('product_variants')
                ->where('product_id', $product_id)
                ->pluck('id')
                ->toArray();
            $variant_id = $variantIds[array_rand($variantIds)];
            
            // if already in cart then skip
            $already_exists = DB::table('carts')
                ->where('user_id', $user_id)
                ->where('product_id', $product_id)
                ->where('variant_id', $variant_id)
                ->exists();
            
            if($already_exists) continue;

            
            // Insert data
            DB::table('carts')->insert([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'variant_id' => $variant_id,
                'quantity' => rand(1, 4),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
