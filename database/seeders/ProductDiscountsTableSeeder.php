<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductDiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        for($i=0;$i<200;$i++) {
            $product_id = rand(1, 245);

            // get a relevant variant_id
            $variantIds = DB::table('product_variants')
                ->where('product_id', $product_id)
                ->pluck('id')
                ->toArray();
            $variant_id = $variantIds[array_rand($variantIds)];

            // check if already exists
            $already_exists = DB::table('product_discounts')
                ->where('product_id', $product_id)
                ->where('variant_id', $variant_id)
                ->exists();
                
            if($already_exists) continue;

            $discount_type = 'percentage';
            $discount = rand(5, 15);
            if(rand(false, true)) {
                $discount_type = 'fixed';
                $price = DB::table('product_variants')
                    ->where('product_id', $product_id)
                    ->where('id', $variant_id)
                    ->value('price');

                $discount*=$price;
                $discount/=100;
                $discount = (int)$discount;
            }

            DB::table('product_discounts')->insert([
                'product_id' => $product_id,
                'variant_id' => $variant_id,
                'discount_type' => $discount_type,
                'amount' => $discount
            ]);
        }
    }
}
