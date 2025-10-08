<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'seller'], 
            ['name' => 'user'],
        ]);
        DB::table('permissions')->insert([
           ['name' => 'abc'] 
        ]);
        for($i=1;$i<=3;$i++){
            DB::table('permission_role')->insert([
                'role_id' => $i,
                'permission_id' => 1
            ]);
        }
    }
}
