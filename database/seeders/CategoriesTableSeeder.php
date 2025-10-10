<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now();

        // Main (top-level) categories
        $mainCategories = [
            'Electronics',
            'Fashion',
            'Home & Living',
            'Beauty & Personal Care',
            'Health & Wellness',
            'Sports & Outdoors',
            'Toys & Babies',
            'Automotive',
            'Books & Media',
            'Office Supplies',
            'Groceries',
            'Jewelry & Accessories',
            'Pet Supplies',
            'Tools & Home Improvement',
            'Garden & Outdoors',
        ];

        // Insert main categories and keep their IDs
        $parentMap = [];
        foreach ($mainCategories as $name) {
            $parentMap[$name] = DB::table('product_categories')->insertGetId([
                'name' => $name,
                'parent_id' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        // Subcategories mapping (each key references a main category above)
        $subCategories = [
            'Electronics' => [
                'Mobile Phones',
                'Computers & Laptops',
                'Televisions & Home Theater',
                'Cameras & Accessories',
            ],
            'Fashion' => [
                'Men Clothing',
                'Women Clothing',
                'Kids Clothing',
                'Bags & Accessories',
            ],
            'Home & Living' => [
                'Furniture',
                'Bedding & Bath',
                'Kitchen & Dining',
                'Home Decor',
            ],
            'Beauty & Personal Care' => [
                'Skin Care',
                'Hair Care',
                'Makeup',
            ],
            'Health & Wellness' => [
                'Vitamins & Supplements',
                'Medical Supplies',
                'Personal Care Appliances',
            ],
            'Sports & Outdoors' => [
                'Fitness Equipment',
                'Outdoor Recreation',
                'Sports Apparel',
            ],
            'Toys & Babies' => [
                'Baby Gear',
                'Learning & Education Toys',
                'Action Figures & Dolls',
            ],
            'Automotive' => [
                'Car Accessories',
                'Motorcycle Parts & Accessories',
                'Car Care & Cleaning',
            ],
            'Books & Media' => [
                'Fiction',
                'Non-fiction',
                'Children Books',
            ],
            'Office Supplies' => [
                'Stationery',
                'Office Electronics',
            ],
            'Groceries' => [
                'Beverages',
                'Packaged Foods',
            ],
            'Jewelry & Accessories' => [
                'Necklaces & Pendants',
                'Watches',
            ],
            'Pet Supplies' => [
                'Pet Food',
                'Pet Accessories',
            ],
            'Tools & Home Improvement' => [
                'Power Tools',
                'Hand Tools',
                'Plumbing & Electrical',
            ],
            'Garden & Outdoors' => [
                'Gardening Tools',
                'Outdoor Furniture',
                'BBQ & Outdoor Cooking',
            ],
        ];

        // Insert subcategories
        foreach ($subCategories as $parent => $children) {
            $parentId = $parentMap[$parent] ?? null;
            if (!$parentId) continue;

            foreach ($children as $childName) {
                DB::table('product_categories')->insert([
                    'name' => $childName,
                    'parent_id' => $parentId,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }

        // Optional: add a few deeper-level categories (grandchildren) for variety
        $electronicsId = $parentMap['Electronics'];
        $computersId = DB::table('product_categories')->where('name', 'Computers & Laptops')->where('parent_id', $electronicsId)->value('id');
        if ($computersId) {
            DB::table('product_categories')->insert([
                ['name' => 'Laptops', 'parent_id' => $computersId, 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Desktops', 'parent_id' => $computersId, 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Computer Accessories', 'parent_id' => $computersId, 'created_at' => $now, 'updated_at' => $now],
            ]);
        }
    }
}
