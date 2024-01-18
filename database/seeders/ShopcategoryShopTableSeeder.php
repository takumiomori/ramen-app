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
        $shops = DB::table('shops')->get();
        foreach ($shops as $shop) {
            $param = [
            'shopcategory_id' => 15,
            'shop_id' => $shop->id,
        ];
        DB::table('shopcategory_shop')->insert($param);
        }
    }
}
