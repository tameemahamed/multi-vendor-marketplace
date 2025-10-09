<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class AddressesTableSeeder extends Seeder
{
    private function randomDistrict($division_id){
        $idS = DB::table('districts')->where('division_id', $division_id)->pluck('id');
        return $idS->random();
    }

    private function has_thana($district_id) {
        return DB::table('thanas')
            ->where('district_id', $district_id)
            ->exists();
    }

    private function randomThana($district_id) {
        $idS = DB::table('thanas')->where('district_id', $district_id)->pluck('id');
        return $idS->random();
    }

    private function randomUpozilla($district_id) {
        $idS = DB::table('upozillas')->where('district_id', $district_id)->pluck('id');
        return $idS->random();  
    }

    private function getMobile($user_id) {
        $number = DB::table('users')->where('id', $user_id)->value('mobile_number');
        return $number;
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $faker = Faker::create('en_BD');

        for($user_id=2; $user_id<=36; $user_id++){
            $count=rand(0,3);
            $table = 'user_addresses';
            $user = 'user_id';
            $id = $user_id;
            if($user_id<=6) {
                $count=1;
                $table = 'seller_addresses';
                $user = 'seller_id';
                $id--;
            }
            while($count--) {
                $add_line_1 = $faker->buildingNumber . ', ' . $faker->streetName;

                // address_line_2: a short landmark-like sentence
                // Build a few Bangladeshi-typical landmark templates with faker data
                $landmarkTemplates = [
                    "Near the main bus stand",
                    "Opposite the post office",
                    "Beside the old railway station",
                    "In front of the sadar hospital",
                    "Next to the local market",
                    "Near the Upazila Complex",
                    "Beside the central Eidgah"
                ];
                $add_line_2 = $landmarkTemplates[array_rand($landmarkTemplates)];
                
                $division_id = rand(1,8);
                $district_id = $this->randomDistrict($division_id);
                $is_thana = rand(false, true);
                $thOrUp = '';
                if(!$this->has_thana($district_id)) {
                    $is_thana = false;
                }
                if($is_thana) {
                    // thana
                    $thOrUp = $this->randomThana($district_id);
                }
                else {
                    // upozilla
                    $thOrUp = $this->randomUpozilla($district_id);
                }
                DB::table($table)->insert([
                    'id' => (string) Str::uuid(),
                    $user => $id,
                    'mobile_number' => $this->getMobile($user_id),
                    'address_line_1' => $add_line_1,
                    'address_line_2' => $add_line_2,
                    'is_thana' => $is_thana,
                    'thana_or_upozilla' => $thOrUp,
                    'district_id' => $district_id,
                    'division_id' => $division_id,
                ]);
            }
        }
    }
}
