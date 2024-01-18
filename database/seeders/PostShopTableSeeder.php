<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post_id = 1;
        for ($shopId = 1; $shopId <= 100; $shopId++) {
            for ($i = 1; $i <= 10; $i++) {
                $param = [
                    'post_id' => $post_id++,
                    'shop_id' => $shopId,
                ];

                DB::table('post_shop')->insert($param);
            }
        }
    }
}
