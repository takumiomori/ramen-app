<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopcategoryShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'shopcategory_id' => 5,
            'shop_id' => 1,
        ];
        DB::table('shopcategory_shop')->insert($param);
    }
}
