<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $faker = Faker::create();

        $sellerIds = DB::table('sellers')->pluck('id')->toArray();
        if (empty($sellerIds)) {
            $this->command->info('No sellers found in `sellers` table. Please seed sellers before running ProductsTableSeeder.');
            return;
        }

        $categoryMap = DB::table('product_categories')->pluck('id', 'name')->toArray();
        if (empty($categoryMap)) {
            $this->command->info('No categories found in `product_categories` table. Please run ProductCategoriesTableSeeder first.');
            return;
        }

        // Seed variant statuses if not present
        if (DB::table('product_variant_statuses')->count() == 0) {
            $statuses = [
                ['name' => 'In Stock', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Out of Stock', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Pre Order', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Discontinued', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Coming Soon', 'created_at' => $now, 'updated_at' => $now],
                ['name' => 'Limited Edition', 'created_at' => $now, 'updated_at' => $now],                
            ];
            DB::table('product_variant_statuses')->insert($statuses);
        }
        $statusMap = DB::table('product_variant_statuses')->pluck('id', 'name')->toArray();

        // Define real products with actual categories and variants
        // Expanded to 200 products across all categories, using real examples
        $productsData = [];

        // Electronics - Mobile Phones (10 products)
        $productsData[] = [
            'name' => 'Apple iPhone 17',
            'description' => 'The latest iPhone with advanced AI features and improved camera system.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '128GB Midnight', 'price' => 999, 'stock' => 100, 'status' => 'In Stock'],
                ['name' => '256GB Starlight', 'price' => 1099, 'stock' => 80, 'status' => 'In Stock'],
                ['name' => '512GB Blue Titanium', 'price' => 1299, 'stock' => 50, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'Google Pixel 9a',
            'description' => 'Affordable Pixel with excellent camera and clean Android experience.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '128GB Obsidian', 'price' => 499, 'stock' => 120, 'status' => 'In Stock'],
                ['name' => '256GB Porcelain', 'price' => 599, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Samsung Galaxy S25 Ultra',
            'description' => 'Flagship Samsung phone with S Pen and top-tier performance.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '256GB Titanium Black', 'price' => 1299, 'stock' => 70, 'status' => 'In Stock'],
                ['name' => '512GB Titanium Gray', 'price' => 1399, 'stock' => 60, 'status' => 'In Stock'],
                ['name' => '1TB Titanium Violet', 'price' => 1599, 'stock' => 40, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'Samsung Galaxy Z Fold 7',
            'description' => 'Foldable phone with large inner display for multitasking.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '512GB Silver Shadow', 'price' => 1899, 'stock' => 50, 'status' => 'In Stock'],
                ['name' => '1TB Navy', 'price' => 1999, 'stock' => 30, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'Google Pixel 10 Pro',
            'description' => 'Premium Pixel with advanced AI and camera capabilities.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '128GB Hazel', 'price' => 999, 'stock' => 100, 'status' => 'In Stock'],
                ['name' => '256GB Sage', 'price' => 1099, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Apple iPhone 16 Pro Max',
            'description' => 'Large-screen iPhone with pro-level features.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '256GB Desert Titanium', 'price' => 1199, 'stock' => 90, 'status' => 'In Stock'],
                ['name' => '512GB Black Titanium', 'price' => 1399, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'OnePlus 13',
            'description' => 'High-performance phone with fast charging.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '256GB Black', 'price' => 899, 'stock' => 110, 'status' => 'In Stock'],
                ['name' => '512GB Green', 'price' => 999, 'stock' => 85, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Xiaomi 15 Ultra',
            'description' => 'Ultra-premium phone with exceptional camera.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '512GB Black', 'price' => 1299, 'stock' => 60, 'status' => 'In Stock'],
                ['name' => '1TB White', 'price' => 1499, 'stock' => 40, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'Honor Magic V3',
            'description' => 'Slim foldable with powerful specs.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '512GB Black', 'price' => 1799, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Oppo Find N5',
            'description' => 'Compact foldable with great display.',
            'category' => 'Mobile Phones',
            'variants' => [
                ['name' => '256GB Silver', 'price' => 1699, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];

        // Electronics - Computers & Laptops (10 products)
        $productsData[] = [
            'name' => 'Dell 14 Plus',
            'description' => 'Compact laptop for everyday use.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Intel Core i5 16GB RAM 512GB SSD', 'price' => 799, 'stock' => 100, 'status' => 'In Stock'],
                ['name' => 'Intel Core i7 32GB RAM 1TB SSD', 'price' => 1299, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Dell Precision 5690',
            'description' => 'High-performance workstation laptop.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Intel Core i9 64GB RAM 2TB SSD', 'price' => 2999, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Apple MacBook Air 13-Inch M4',
            'description' => 'Lightweight MacBook with M4 chip.',
            'category' => 'Laptops',
            'variants' => [
                ['name' => '8GB RAM 256GB SSD Silver', 'price' => 1099, 'stock' => 120, 'status' => 'In Stock'],
                ['name' => '16GB RAM 512GB SSD Space Gray', 'price' => 1499, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Acer Aspire 3',
            'description' => 'Budget-friendly laptop for basic tasks.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'AMD Ryzen 3 8GB RAM 512GB SSD', 'price' => 499, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Lenovo ThinkPad X9 14 Aura',
            'description' => 'Business laptop with durable build.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Intel Core Ultra 16GB RAM 1TB SSD', 'price' => 1599, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Lenovo Yoga 9i 2-in-1',
            'description' => 'Versatile 2-in-1 laptop.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Intel Core i7 16GB RAM 512GB SSD', 'price' => 1399, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Acer Swift Go 14',
            'description' => 'Slim and light laptop.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'AMD Ryzen 7 16GB RAM 512GB SSD', 'price' => 899, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Asus Zenbook 14 OLED',
            'description' => 'Laptop with stunning OLED display.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Intel Core Ultra 16GB RAM 1TB SSD', 'price' => 1299, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Asus Zenbook S',
            'description' => 'Premium ultraportable laptop.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'AMD Ryzen AI 16GB RAM 512GB SSD', 'price' => 1499, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Lenovo ThinkPad T14s Gen 6',
            'description' => 'Reliable business laptop.',
            'category' => 'Computers & Laptops',
            'variants' => [
                ['name' => 'Snapdragon X Elite 32GB RAM 1TB SSD', 'price' => 1699, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];

        // Electronics - Televisions & Home Theater (10 products)
        $productsData[] = [
            'name' => 'Samsung S95F OLED',
            'description' => 'Premium OLED TV with quantum dot technology.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '55 Inch', 'price' => 1899, 'stock' => 50, 'status' => 'In Stock'],
                ['name' => '65 Inch', 'price' => 2499, 'stock' => 40, 'status' => 'In Stock'],
                ['name' => '77 Inch', 'price' => 3499, 'stock' => 30, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'LG Evo G5 OLED TV',
            'description' => 'Bright OLED TV for superior picture quality.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '55 Inch', 'price' => 1999, 'stock' => 60, 'status' => 'In Stock'],
                ['name' => '65 Inch', 'price' => 2999, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Hisense U8QG',
            'description' => 'High-value Mini-LED TV.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '65 Inch', 'price' => 1499, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Roku Pro Series',
            'description' => 'Smart TV with Roku OS.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '55 Inch', 'price' => 899, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Amazon Fire TV Omni Mini-LED',
            'description' => 'Integrated Fire TV with Mini-LED backlight.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '65 Inch', 'price' => 1199, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Hisense 116UX',
            'description' => 'Massive 116-inch TV for home theater.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '116 Inch', 'price' => 7999, 'stock' => 10, 'status' => 'Pre Order'],
            ],
        ];
        $productsData[] = [
            'name' => 'LG C5 OLED',
            'description' => 'Balanced OLED TV for gaming and movies.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '48 Inch', 'price' => 1299, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'TCL C6KS',
            'description' => 'Affordable QLED TV.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '55 Inch', 'price' => 699, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'LG OLED42C4',
            'description' => 'Compact OLED for gaming.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '42 Inch', 'price' => 1099, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Panasonic TV-48Z90B',
            'description' => 'High-end TV with accurate colors.',
            'category' => 'Televisions & Home Theater',
            'variants' => [
                ['name' => '48 Inch', 'price' => 1499, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];

        // Electronics - Cameras & Accessories (10 products)
        $productsData[] = [
            'name' => 'Fujifilm X-T5',
            'description' => 'Mirrorless camera for photography enthusiasts.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only Silver', 'price' => 1699, 'stock' => 50, 'status' => 'In Stock'],
                ['name' => 'With 16-80mm Lens Black', 'price' => 2099, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Canon EOS R6 Mark II',
            'description' => 'Full-frame mirrorless for pros.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 2499, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Sony A7 IV',
            'description' => 'Versatile full-frame camera.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 2499, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fujifilm X-T50',
            'description' => 'Compact APS-C camera.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only Charcoal', 'price' => 1399, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Sony α6700',
            'description' => 'APS-C mirrorless with AI features.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 1399, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nikon Z5II',
            'description' => 'Entry-level full-frame mirrorless.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 1399, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nikon Z6III',
            'description' => 'Mid-range full-frame camera.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 2499, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nikon Z8',
            'description' => 'High-resolution full-frame camera.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 3999, 'stock' => 30, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fujifilm X-S20',
            'description' => 'Vlogging and photography camera.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Body Only', 'price' => 1299, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'DJI Osmo Action 5 Pro',
            'description' => 'Action camera for adventures.',
            'category' => 'Cameras & Accessories',
            'variants' => [
                ['name' => 'Standard Combo', 'price' => 349, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];

        // Fashion - Men Clothing (10 products)
        $productsData[] = [
            'name' => 'Levi\'s Men\'s 501 Original Jeans',
            'description' => 'Classic straight-leg jeans for men.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Size 32 Blue', 'price' => 59, 'stock' => 200, 'status' => 'In Stock'],
                ['name' => 'Size 34 Black', 'price' => 59, 'stock' => 180, 'status' => 'In Stock'],
                ['name' => 'Size 36 Medium Wash', 'price' => 59, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nike Men\'s Sportswear Club Fleece',
            'description' => 'Comfortable fleece hoodie.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Medium Gray', 'price' => 55, 'stock' => 150, 'status' => 'In Stock'],
                ['name' => 'Large Black', 'price' => 55, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Adidas Men\'s Essentials 3-Stripes Hoodie',
            'description' => 'Sporty hoodie with signature stripes.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Small Blue', 'price' => 50, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Under Armour Men\'s Tech 2.0 T-Shirt',
            'description' => 'Moisture-wicking t-shirt for active wear.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Medium Red', 'price' => 25, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Tommy Hilfiger Men\'s Classic Polo',
            'description' => 'Timeless polo shirt.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Large White', 'price' => 49, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Calvin Klein Men\'s Cotton Classics Boxer Briefs',
            'description' => 'Comfortable underwear pack.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Medium Pack of 3', 'price' => 39, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'The North Face Men\'s Resolve 2 Jacket',
            'description' => 'Waterproof jacket for outdoors.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Large Black', 'price' => 99, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Columbia Men\'s Steens Mountain Full Zip Fleece',
            'description' => 'Warm fleece jacket.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'XL Gray', 'price' => 60, 'stock' => 110, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Wrangler Men\'s Cowboy Cut Slim Fit Jean',
            'description' => 'Durable jeans for work.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Size 32 Dark Wash', 'price' => 45, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Carhartt Men\'s Loose Fit Heavyweight T-Shirt',
            'description' => 'Heavy-duty t-shirt with pocket.',
            'category' => 'Men Clothing',
            'variants' => [
                ['name' => 'Large Navy', 'price' => 25, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];

        // Fashion - Women Clothing (10 products)
        $productsData[] = [
            'name' => 'Lululemon Align Leggings',
            'description' => 'High-waisted yoga leggings.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Size 6 Black', 'price' => 98, 'stock' => 150, 'status' => 'In Stock'],
                ['name' => 'Size 8 Navy', 'price' => 98, 'stock' => 130, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Aritzia Effortless Pants',
            'description' => 'Comfortable wide-leg pants.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Small Beige', 'price' => 148, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Madewell Perfect Vintage Jeans',
            'description' => 'Classic straight-leg jeans.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Size 27 Medium Wash', 'price' => 128, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Free People We The Free Good Luck Barrel Jeans',
            'description' => 'Trendy barrel-leg jeans.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Size 26 Blue', 'price' => 98, 'stock' => 110, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Reformation Cynthia High Rise Jeans',
            'description' => 'Sustainable high-rise jeans.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Size 28 Black', 'price' => 198, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nike Women\'s Sportswear Essential T-Shirt',
            'description' => 'Basic cotton t-shirt.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Medium White', 'price' => 30, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Adidas Women\'s Essentials 3-Stripes Leggings',
            'description' => 'Athletic leggings with stripes.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Small Black', 'price' => 40, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Everlane The Way-High Jean',
            'description' => 'High-waisted denim jeans.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Size 29 Dark Wash', 'price' => 88, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'H&M Ribbed Knit Sweater',
            'description' => 'Cozy knit sweater.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Large Cream', 'price' => 35, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Zara Basic Blazer',
            'description' => 'Tailored blazer for office wear.',
            'category' => 'Women Clothing',
            'variants' => [
                ['name' => 'Medium Black', 'price' => 79, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];

        // Fashion - Kids Clothing (10 products)
        $productsData[] = [
            'name' => 'Carter\'s Baby Bodysuit Set',
            'description' => 'Soft cotton bodysuits for babies.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => '0-3 Months Pack of 5', 'price' => 20, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Gap Kids Graphic T-Shirt',
            'description' => 'Fun graphic tees for children.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 6 Blue', 'price' => 15, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Old Navy Kids Jeans',
            'description' => 'Comfortable jeans for kids.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 8 Slim Fit', 'price' => 25, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'H&M Kids Hoodie',
            'description' => 'Cozy hoodie for children.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 10 Gray', 'price' => 20, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Under Armour Kids Tech T-Shirt',
            'description' => 'Moisture-wicking shirt for active kids.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 7 Red', 'price' => 18, 'stock' => 220, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nike Kids Sportswear Leggings',
            'description' => 'Stretchy leggings for girls.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 12 Black', 'price' => 30, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Adidas Kids Tracksuit',
            'description' => 'Sporty tracksuit set.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 5 Blue', 'price' => 50, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'The Children\'s Place Kids Pajama Set',
            'description' => 'Comfortable PJs for bedtime.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 4 Pack of 2', 'price' => 15, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Columbia Kids Fleece Jacket',
            'description' => 'Warm jacket for outdoor play.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 6 Pink', 'price' => 40, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Levi\'s Kids Batwing T-Shirt',
            'description' => 'Classic logo t-shirt.',
            'category' => 'Kids Clothing',
            'variants' => [
                ['name' => 'Size 8 White', 'price' => 20, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];

        // Fashion - Bags & Accessories (10 products)
        $productsData[] = [
            'name' => 'Coach Tabby Shoulder Bag',
            'description' => 'Iconic leather shoulder bag.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Black', 'price' => 395, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Michael Kors Jet Set Tote',
            'description' => 'Spacious tote for daily use.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Brown', 'price' => 298, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Kate Spade New York Knott Satchel',
            'description' => 'Elegant satchel with knot detail.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Cream', 'price' => 328, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Herschel Little America Backpack',
            'description' => 'Classic backpack for travel.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Black', 'price' => 100, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fjallraven Kanken Backpack',
            'description' => 'Durable vinyl backpack.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Navy', 'price' => 80, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Ray-Ban Wayfarer Sunglasses',
            'description' => 'Classic sunglasses.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Black Frame', 'price' => 150, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Oakley Holbrook Sunglasses',
            'description' => 'Sporty polarized sunglasses.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Matte Black', 'price' => 140, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Levi\'s Batwing Tote Bag',
            'description' => 'Canvas tote with logo.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Natural', 'price' => 30, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Adidas Originals Waist Pack',
            'description' => 'Compact fanny pack.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Black', 'price' => 25, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'North Face Borealis Backpack',
            'description' => 'Versatile backpack for hiking.',
            'category' => 'Bags & Accessories',
            'variants' => [
                ['name' => 'Gray', 'price' => 99, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];

        // Home & Living - Furniture (10 products)
        $productsData[] = [
            'name' => 'IKEA Billy Bookcase',
            'description' => 'Versatile bookcase for home storage.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'White', 'price' => 59, 'stock' => 200, 'status' => 'In Stock'],
                ['name' => 'Black-Brown', 'price' => 59, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Article Sven Sofa',
            'description' => 'Mid-century modern sofa.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Charme Tan', 'price' => 999, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Wayfair Andover Mills Coffee Table',
            'description' => 'Simple wooden coffee table.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Espresso', 'price' => 100, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'West Elm Mid-Century Bed',
            'description' => 'Wooden platform bed.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Queen Acorn', 'price' => 899, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'CB2 Alchemy Dining Table',
            'description' => 'Modern metal dining table.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Brass', 'price' => 799, 'stock' => 30, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'IKEA Malm Dresser',
            'description' => '6-drawer dresser for bedroom.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'White', 'price' => 169, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Pottery Barn Teen Gear-Up Desk',
            'description' => 'Study desk for teens.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Gray', 'price' => 499, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'AllModern Nora Armchair',
            'description' => 'Comfortable accent chair.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Blue Velvet', 'price' => 300, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Crate & Barrel Edgewood Side Table',
            'description' => 'Rustic side table.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => 'Natural Wood', 'price' => 199, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'IKEA Kallax Shelf Unit',
            'description' => 'Cube storage shelf.',
            'category' => 'Furniture',
            'variants' => [
                ['name' => '4x4 White', 'price' => 89, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];

        // Home & Living - Bedding & Bath (10 products)
        $productsData[] = [
            'name' => 'Brooklinen Luxe Sheet Set',
            'description' => 'Sateen cotton sheet set.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Queen White', 'price' => 159, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Parachute Linen Duvet Cover',
            'description' => 'Breathable linen duvet.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Full/Queen Blush', 'price' => 249, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Coyuchi Organic Towel Set',
            'description' => 'Soft organic cotton towels.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Set of 6 White', 'price' => 98, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Matouk Milagro Bath Towel',
            'description' => 'Luxury Egyptian cotton towel.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Ivory', 'price' => 59, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Buffy Cloud Comforter',
            'description' => 'Eco-friendly comforter.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Twin White', 'price' => 120, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Casper Original Pillow',
            'description' => 'Supportive foam pillow.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Standard', 'price' => 65, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Ugg Ansel Blanket',
            'description' => 'Soft throw blanket.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Gray', 'price' => 98, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Threshold Performance Sheet Set',
            'description' => 'Microfiber sheet set from Target.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'King Gray', 'price' => 40, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Bath & Body Works Shower Curtain',
            'description' => 'Decorative shower curtain.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => 'Floral Pattern', 'price' => 30, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Simplehuman Sensor Mirror',
            'description' => 'Lighted bathroom mirror.',
            'category' => 'Bedding & Bath',
            'variants' => [
                ['name' => '8 Inch', 'price' => 200, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];

        // Home & Living - Kitchen & Dining (10 products)
        $productsData[] = [
            'name' => 'Le Creuset Dutch Oven',
            'description' => 'Enameled cast iron pot.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '5.5 Qt Caribbean', 'price' => 360, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'KitchenAid Stand Mixer',
            'description' => 'Iconic stand mixer for baking.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '5 Qt Red', 'price' => 300, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Vitamix Explorian Blender',
            'description' => 'High-power blender.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => 'Black', 'price' => 270, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Zwilling J.A. Henckels Knife Set',
            'description' => 'Professional knife block set.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '8 Piece', 'price' => 200, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Pyrex Glass Bakeware Set',
            'description' => 'Durable glass baking dishes.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '10 Piece', 'price' => 40, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Corelle Dinnerware Set',
            'description' => 'Lightweight chip-resistant plates.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '16 Piece White', 'price' => 50, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nespresso Vertuo Machine',
            'description' => 'Coffee and espresso maker.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => 'Chrome', 'price' => 200, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Cuisinart Food Processor',
            'description' => '11-Cup food processor.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => 'Brushed Stainless', 'price' => 150, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Lodge Cast Iron Skillet',
            'description' => 'Pre-seasoned skillet.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => '10.25 Inch', 'price' => 25, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'OXO Good Grips Salad Spinner',
            'description' => 'Easy-to-use salad spinner.',
            'category' => 'Kitchen & Dining',
            'variants' => [
                ['name' => 'Large', 'price' => 30, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];

        // Home & Living - Home Decor (10 products)
        $productsData[] = [
            'name' => 'West Elm Harmony Vase',
            'description' => 'Ceramic vase for flowers.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => 'Large Blue', 'price' => 50, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Anthropologie Gleaming Primrose Mirror',
            'description' => 'Ornate wall mirror.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => '3 Ft Gold', 'price' => 398, 'stock' => 30, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'CB2 Acrylic Frame',
            'description' => 'Modern photo frame.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => '8x10 Clear', 'price' => 30, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Pottery Barn Faux Fur Throw',
            'description' => 'Soft decorative throw.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => 'Ivory', 'price' => 89, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Urban Outfitters Wall Art Print',
            'description' => 'Abstract art print.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => '24x36', 'price' => 40, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'IKEA Sinnerlig Pendant Lamp',
            'description' => 'Bamboo hanging lamp.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => 'Natural', 'price' => 60, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Threshold Decorative Pillow',
            'description' => 'Textured throw pillow.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => '18x18 Gray', 'price' => 20, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Yankee Candle Large Jar',
            'description' => 'Scented candle.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => 'Balsam & Cedar', 'price' => 28, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Society6 Wall Tapestry',
            'description' => 'Artistic wall hanging.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => 'Small', 'price' => 40, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'H&M Home Cotton Rug',
            'description' => 'Woven area rug.',
            'category' => 'Home Decor',
            'variants' => [
                ['name' => '5x7 Beige', 'price' => 100, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];

        // Beauty & Personal Care - Skin Care (10 products)
        $productsData[] = [
            'name' => 'CeraVe Hydrating Facial Cleanser',
            'description' => 'Gentle foaming cleanser.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '16 oz', 'price' => 15, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'La Roche-Posay Toleriane Moisturizer',
            'description' => 'Hydrating face cream.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '40 ml', 'price' => 20, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'The Ordinary Niacinamide Serum',
            'description' => 'Brightening serum.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '30 ml', 'price' => 6, 'stock' => 400, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Neutrogena Hydro Boost Gel-Cream',
            'description' => 'Hyaluronic acid moisturizer.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '1.7 oz', 'price' => 20, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Paula\'s Choice Skin Perfecting Exfoliant',
            'description' => 'BHA liquid exfoliant.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '4 oz', 'price' => 32, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'EltaMD UV Clear Sunscreen',
            'description' => 'Broad-spectrum SPF 46.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '1.7 oz', 'price' => 39, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Youth to the People Superfood Cleanser',
            'description' => 'Green juice cleanser.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '8 oz', 'price' => 39, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Drunk Elephant Protini Polypeptide Cream',
            'description' => 'Protein moisturizer.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '50 ml', 'price' => 68, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Glow Recipe Watermelon Toner',
            'description' => 'Hydrating pore-refining toner.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '150 ml', 'price' => 34, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Supergoop Unseen Sunscreen',
            'description' => 'Invisible SPF 40.',
            'category' => 'Skin Care',
            'variants' => [
                ['name' => '1.7 oz', 'price' => 38, 'stock' => 110, 'status' => 'In Stock'],
            ],
        ];

        // Beauty & Personal Care - Hair Care (10 products)
        $productsData[] = [
            'name' => 'Olaplex No.3 Hair Perfector',
            'description' => 'Bond repairing treatment.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '3.3 oz', 'price' => 30, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Moroccanoil Treatment',
            'description' => 'Argan oil hair serum.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '3.4 oz', 'price' => 44, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Briogeo Scalp Revival Shampoo',
            'description' => 'Charcoal clarifying shampoo.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '8 oz', 'price' => 42, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Living Proof Dry Shampoo',
            'description' => 'Oil-absorbing dry shampoo.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '5 oz', 'price' => 28, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Ouai Leave-In Conditioner',
            'description' => 'Detangling spray.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '4.7 oz', 'price' => 28, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Aveda Damage Remedy Conditioner',
            'description' => 'Repairing conditioner.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '6.7 oz', 'price' => 34, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Batiste Dry Shampoo',
            'description' => 'Affordable dry shampoo.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '6.73 oz Original', 'price' => 9, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'SheaMoisture Manuka Honey Mask',
            'description' => 'Deep conditioning mask.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '12 oz', 'price' => 12, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Kérastase Nutritive Shampoo',
            'description' => 'Nourishing shampoo for dry hair.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '8.5 oz', 'price' => 40, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Paul Mitchell Tea Tree Special Shampoo',
            'description' => 'Invigorating shampoo.',
            'category' => 'Hair Care',
            'variants' => [
                ['name' => '10.14 oz', 'price' => 18, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];

        // Beauty & Personal Care - Makeup (10 products)
        $productsData[] = [
            'name' => 'Fenty Beauty Pro Filt\'r Foundation',
            'description' => 'Longwear foundation.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Shade 300', 'price' => 40, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Maybelline Lash Sensational Mascara',
            'description' => 'Volumizing mascara.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Blackest Black', 'price' => 9, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'MAC Ruby Woo Lipstick',
            'description' => 'Classic red lipstick.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Matte', 'price' => 21, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Anastasia Beverly Hills Brow Wiz',
            'description' => 'Ultra-slim brow pencil.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Taupe', 'price' => 25, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'NARS Radiant Creamy Concealer',
            'description' => 'Hydrating concealer.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Custard', 'price' => 32, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Urban Decay All Nighter Setting Spray',
            'description' => 'Long-lasting makeup spray.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => '4 oz', 'price' => 36, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Too Faced Born This Way Foundation',
            'description' => 'Natural finish foundation.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Shade Vanilla', 'price' => 42, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Benefit Hoola Bronzer',
            'description' => 'Matte bronzer.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Original', 'price' => 36, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Charlotte Tilbury Pillow Talk Lipstick',
            'description' => 'Nude-pink lipstick.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Matte Revolution', 'price' => 37, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'e.l.f. Bite Size Eyeshadow',
            'description' => 'Affordable eyeshadow palette.',
            'category' => 'Makeup',
            'variants' => [
                ['name' => 'Rose Water', 'price' => 3, 'stock' => 400, 'status' => 'In Stock'],
            ],
        ];

        // Health & Wellness - Vitamins & Supplements (10 products)
        $productsData[] = [
            'name' => 'Nature Made Vitamin D3',
            'description' => 'Bone health supplement.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '2000 IU 250 Softgels', 'price' => 12, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Optimum Nutrition Gold Standard Whey',
            'description' => 'Protein powder.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => 'Double Rich Chocolate 5 lb', 'price' => 60, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Now Foods Omega-3',
            'description' => 'Fish oil supplement.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '1000 mg 200 Softgels', 'price' => 15, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Garden of Life Vitamin Code Multivitamin',
            'description' => 'Whole food multivitamin.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => 'For Men 120 Capsules', 'price' => 40, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Sports Research Collagen Peptides',
            'description' => 'Hydrolyzed collagen powder.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => 'Unflavored 16 oz', 'price' => 28, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nature\'s Bounty Biotin',
            'description' => 'Hair, skin, nails supplement.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '10000 mcg 120 Softgels', 'price' => 10, 'stock' => 350, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Thorne Research Basic B Complex',
            'description' => 'B vitamin supplement.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '60 Capsules', 'price' => 25, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Jarrow Formulas Methyl B-12',
            'description' => 'Vitamin B12 lozenges.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '5000 mcg 60 Lozenges', 'price' => 20, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nordic Naturals Ultimate Omega',
            'description' => 'High-potency fish oil.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => '1280 mg 60 Softgels', 'price' => 25, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Orgain Organic Protein Powder',
            'description' => 'Plant-based protein.',
            'category' => 'Vitamins & Supplements',
            'variants' => [
                ['name' => 'Vanilla Bean 2.03 lb', 'price' => 30, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];

        // Health & Wellness - Medical Supplies (10 products)
        $productsData[] = [
            'name' => 'Band-Aid Flexible Fabric Bandages',
            'description' => 'Adhesive bandages.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '30 Count', 'price' => 4, 'stock' => 500, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Johnson & Johnson First Aid Kit',
            'description' => '175-piece all-purpose kit.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => 'One Size', 'price' => 20, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Tylenol Extra Strength Acetaminophen',
            'description' => 'Pain reliever caplets.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '100 Count', 'price' => 10, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Advil Ibuprofen Tablets',
            'description' => 'Pain relief tablets.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '200 Count', 'price' => 15, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Mueller Adjustable Back Brace',
            'description' => 'Support for lower back.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => 'One Size', 'price' => 20, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Omron Blood Pressure Monitor',
            'description' => 'Upper arm monitor.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => 'Series 5', 'price' => 50, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Accu-Chek Guide Glucose Meter',
            'description' => 'Blood sugar testing kit.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => 'Kit', 'price' => 30, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'TheraBand Resistance Bands',
            'description' => 'Exercise bands set.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '3 Pack', 'price' => 15, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Curad Alcohol Prep Pads',
            'description' => 'Antiseptic wipes.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '200 Count', 'price' => 5, 'stock' => 400, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nexcare Waterproof Tape',
            'description' => 'Flexible medical tape.',
            'category' => 'Medical Supplies',
            'variants' => [
                ['name' => '1 Inch x 5 Yards', 'price' => 4, 'stock' => 350, 'status' => 'In Stock'],
            ],
        ];

        // Health & Wellness - Personal Care Appliances (10 products)
        $productsData[] = [
            'name' => 'Philips Sonicare Electric Toothbrush',
            'description' => 'Rechargeable toothbrush.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => '4100 Series', 'price' => 40, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Braun Series 9 Electric Shaver',
            'description' => 'Foil shaver for men.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => '9290cc', 'price' => 300, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Dyson Supersonic Hair Dryer',
            'description' => 'Fast drying hair dryer.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Nickel/Copper', 'price' => 400, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Foreo Luna 3 Facial Brush',
            'description' => 'Silicone cleansing device.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Pink', 'price' => 169, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Waterpik Water Flosser',
            'description' => 'Cordless oral irrigator.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Advanced', 'price' => 70, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Revlon One-Step Hair Dryer',
            'description' => 'Volumizer and styler.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Black', 'price' => 40, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Panasonic Arc5 Shaver',
            'description' => 'Electric razor for men.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'ES-LV65-S', 'price' => 150, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Conair Infiniti Pro Curling Iron',
            'description' => 'Tourmaline ceramic curler.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => '1 Inch', 'price' => 30, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Theragun Mini Massage Gun',
            'description' => 'Portable percussive therapy.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Black', 'price' => 199, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'OMRON Evolv Blood Pressure Monitor',
            'description' => 'Wireless upper arm monitor.',
            'category' => 'Personal Care Appliances',
            'variants' => [
                ['name' => 'Bluetooth', 'price' => 80, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];

        // Sports & Outdoors - Fitness Equipment (10 products)
        $productsData[] = [
            'name' => 'Peloton Bike',
            'description' => 'Indoor cycling bike.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Standard', 'price' => 1445, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Bowflex SelectTech Dumbbells',
            'description' => 'Adjustable dumbbells.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Pair 5-52 lb', 'price' => 429, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'TRX Suspension Trainer',
            'description' => 'Bodyweight training system.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Home2', 'price' => 200, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Rogue Echo Bike',
            'description' => 'Air resistance bike.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black', 'price' => 795, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Manduka PRO Yoga Mat',
            'description' => 'Dense cushion yoga mat.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black 71 Inch', 'price' => 120, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Concept2 Model D Rower',
            'description' => 'Indoor rowing machine.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black', 'price' => 900, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Therabody Theragun Elite',
            'description' => 'Percussion massage device.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black', 'price' => 399, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fitbit Charge 6',
            'description' => 'Fitness tracker.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black', 'price' => 150, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'NordicTrack T Series Treadmill',
            'description' => 'Folding treadmill.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => '6.5 S', 'price' => 599, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Schwinn IC4 Indoor Cycling Bike',
            'description' => 'Magnetic resistance bike.',
            'category' => 'Fitness Equipment',
            'variants' => [
                ['name' => 'Black', 'price' => 799, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];

        // Sports & Outdoors - Outdoor Recreation (10 products)
        $productsData[] = [
            'name' => 'Coleman Sundome Tent',
            'description' => 'Easy setup camping tent.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => '4 Person', 'price' => 90, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'YETI Tundra 45 Cooler',
            'description' => 'Heavy-duty cooler.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'White', 'price' => 300, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'ENO DoubleNest Hammock',
            'description' => 'Portable hammock.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Charcoal/Red', 'price' => 70, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Black Diamond Spot Headlamp',
            'description' => 'Waterproof headlamp.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => '400 Lumens', 'price' => 50, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Patagonia Nano Puff Jacket',
            'description' => 'Lightweight insulated jacket.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Men\'s Medium Black', 'price' => 199, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Osprey Atmos AG 65 Backpack',
            'description' => 'Hiking backpack.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Medium', 'price' => 270, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Intex Explorer K2 Kayak',
            'description' => 'Inflatable kayak.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => '2 Person', 'price' => 150, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Therm-a-Rest NeoAir Sleeping Pad',
            'description' => 'Ultralight sleeping pad.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Regular', 'price' => 200, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Garmin inReach Mini',
            'description' => 'Satellite communicator.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Orange', 'price' => 350, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Columbia Benton Springs Fleece',
            'description' => 'Women\'s full-zip fleece.',
            'category' => 'Outdoor Recreation',
            'variants' => [
                ['name' => 'Small Black', 'price' => 40, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];

        // Sports & Outdoors - Sports Apparel (10 products)
        $productsData[] = [
            'name' => 'Nike Dri-FIT Running Shorts',
            'description' => 'Moisture-wicking shorts.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Men\'s Medium Black', 'price' => 30, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Under Armour HeatGear Leggings',
            'description' => 'Compression leggings.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Women\'s Small Gray', 'price' => 40, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Adidas Ultraboost Shoes',
            'description' => 'Running shoes.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Men\'s Size 10 White', 'price' => 180, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Lululemon Scuba Hoodie',
            'description' => 'Oversized fleece hoodie.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Women\'s Medium Heathered Black', 'price' => 118, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Puma Essentials T-Shirt',
            'description' => 'Basic athletic tee.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Men\'s Large Green', 'price' => 20, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'The North Face Tech Gloves',
            'description' => 'Touchscreen gloves.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Medium Black', 'price' => 25, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Brooks Ghost 15 Running Shoes',
            'description' => 'Cushioned running shoes.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Women\'s Size 8 Blue', 'price' => 140, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Champion Powerblend Sweatpants',
            'description' => 'Comfortable sweatpants.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Men\'s XL Navy', 'price' => 35, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Athleta Salutation Stash Tights',
            'description' => 'Yoga tights with pockets.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Women\'s XS Black', 'price' => 89, 'stock' => 110, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'New Balance Fresh Foam 1080 Shoes',
            'description' => 'Plush running shoes.',
            'category' => 'Sports Apparel',
            'variants' => [
                ['name' => 'Men\'s Size 9 Gray', 'price' => 160, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];

        // Toys & Babies - Baby Gear (10 products)
        $productsData[] = [
            'name' => 'Graco Pack \'n Play Playard',
            'description' => 'Portable playpen.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Aspery', 'price' => 60, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'BabyBjorn Bouncer Balance',
            'description' => 'Ergonomic baby bouncer.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Soft Black', 'price' => 200, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'ErgoBaby Omni 360 Carrier',
            'description' => 'All-position baby carrier.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Cool Air Mesh Gray', 'price' => 180, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Hatch Rest Sound Machine',
            'description' => 'Night light and sound machine.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'White', 'price' => 70, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Britax B-Safe Car Seat',
            'description' => 'Infant car seat.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Gen2', 'price' => 200, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fisher-Price Deluxe Swing',
            'description' => 'Baby swing with music.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Snugabunny', 'price' => 160, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Skip Hop Activity Center',
            'description' => '3-stage activity center.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Explore & More', 'price' => 132, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Nan ">= it Baby Monitor',
            'description' => 'Video baby monitor.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Pro', 'price' => 300, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'UPPAbaby Vista Stroller',
            'description' => 'Convertible stroller.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => 'Jordan', 'price' => 1000, 'stock' => 40, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Dr. Brown\'s Baby Bottles',
            'description' => 'Anti-colic bottles set.',
            'category' => 'Baby Gear',
            'variants' => [
                ['name' => '8 oz 3 Pack', 'price' => 15, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];

        // Toys & Babies - Learning & Education Toys (10 products)
        $productsData[] = [
            'name' => 'Melissa & Doug Wooden Blocks',
            'description' => '100-piece block set.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Classic', 'price' => 20, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'LeapFrog Learning Friends 100 Words Book',
            'description' => 'Interactive word book.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'English/Spanish', 'price' => 18, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Osmo Genius Starter Kit',
            'description' => 'iPad learning games.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'For iPad', 'price' => 100, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Fat Brain Toys Tobbles Neo',
            'description' => 'Stacking toy for toddlers.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Bright Colors', 'price' => 27, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'KiwiCo Tinker Crate',
            'description' => 'STEM subscription box.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Single Kit', 'price' => 20, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'VTech Touch and Learn Activity Desk',
            'description' => 'Interactive desk.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Deluxe', 'price' => 55, 'stock' => 90, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Learning Resources Spike the Fine Motor Hedgehog',
            'description' => 'Fine motor skill toy.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Colorful', 'price' => 15, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Magna-Tiles 100-Piece Set',
            'description' => 'Magnetic building tiles.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Clear Colors', 'price' => 120, 'stock' => 70, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Green Toys Shape Sorter',
            'description' => 'Eco-friendly shape sorter.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Multicolor', 'price' => 20, 'stock' => 140, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Little Tikes Learn & Play 2-in-1 Activity Tunnel',
            'description' => 'Crawling tunnel with balls.',
            'category' => 'Learning & Education Toys',
            'variants' => [
                ['name' => 'Red/Blue', 'price' => 40, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];

        // Toys & Babies - Action Figures & Dolls (10 products)
        $productsData[] = [
            'name' => 'Barbie Dreamhouse Doll',
            'description' => 'Fashion doll.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Blonde', 'price' => 10, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Marvel Spider-Man Action Figure',
            'description' => 'Poseable figure.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => '6 Inch', 'price' => 12, 'stock' => 250, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'L.O.L. Surprise! Doll',
            'description' => 'Collectible doll with accessories.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Series 3', 'price' => 10, 'stock' => 400, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Star Wars The Black Series Figure',
            'description' => 'Detailed action figure.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Luke Skywalker', 'price' => 25, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'American Girl Doll',
            'description' => '18-inch historical doll.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Kit Kittredge', 'price' => 115, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Transformers Optimus Prime',
            'description' => 'Converting robot figure.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Voyager Class', 'price' => 30, 'stock' => 120, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Baby Alive Doll',
            'description' => 'Interactive baby doll.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Glo Pixies', 'price' => 20, 'stock' => 180, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'DC Comics Batman Figure',
            'description' => 'Articulated action figure.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => '12 Inch', 'price' => 10, 'stock' => 200, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'My Little Pony Friendship is Magic Figure',
            'description' => 'Collectible pony.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Twilight Sparkle', 'price' => 15, 'stock' => 160, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Funko Pop! Vinyl Figure',
            'description' => 'Collectible vinyl figure.',
            'category' => 'Action Figures & Dolls',
            'variants' => [
                ['name' => 'Harry Potter', 'price' => 11, 'stock' => 300, 'status' => 'In Stock'],
            ],
        ];

        // Automotive - Car Accessories (5 products to reach total 200)
        $productsData[] = [
            'name' => 'WeatherTech Floor Mats',
            'description' => 'Custom-fit floor liners.',
            'category' => 'Car Accessories',
            'variants' => [
                ['name' => 'Black for Toyota Camry', 'price' => 130, 'stock' => 100, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Escort Max 360 Radar Detector',
            'description' => 'Dual antenna radar detector.',
            'category' => 'Car Accessories',
            'variants' => [
                ['name' => 'Black', 'price' => 400, 'stock' => 50, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Meguiar\'s Car Wax Kit',
            'description' => 'Ultimate wax kit.',
            'category' => 'Car Accessories',
            'variants' => [
                ['name' => 'Liquid', 'price' => 20, 'stock' => 150, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Thule Roof Rack',
            'description' => 'AeroBlade edge roof rack.',
            'category' => 'Car Accessories',
            'variants' => [
                ['name' => 'Flush Mount', 'price' => 250, 'stock' => 60, 'status' => 'In Stock'],
            ],
        ];
        $productsData[] = [
            'name' => 'Garmin DriveSmart GPS',
            'description' => '55 & Traffic navigator.',
            'category' => 'Car Accessories',
            'variants' => [
                ['name' => '5 Inch', 'price' => 150, 'stock' => 80, 'status' => 'In Stock'],
            ],
        ];

        // Insert products and variants in chunks
        $products = [];
        $variants = [];
        foreach ($productsData as $data) {
            $categoryId = $categoryMap[$data['category']] ?? null;
            if ($categoryId === null) continue;

            $product = [
                'name' => $data['name'],
                'description' => $data['description'],
                'seller_id' => $faker->randomElement($sellerIds),
                'product_category_id' => $categoryId,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $productId = DB::table('products')->insertGetId($product);

            foreach ($data['variants'] as $v) {
                $variants[] = [
                    'product_id' => $productId,
                    'name' => $v['name'],
                    'price' => $v['price'],
                    'stock' => $v['stock'],
                    'status_id' => $statusMap[$v['status']],
                    'created_at' => $now,
                    'updated_at' => $now,
                ];
            }
        }

        // Insert variants in chunks
        foreach (array_chunk($variants, 50) as $chunk) {
            DB::table('product_variants')->insert($chunk);
        }
    }
}