<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => '麺屋NOROMA',
            'place_id' => 1,
            'image' => 'shop_default.png',
            'holiday' => '水曜日',
            'tel' => '0742-63-5338',
            'address' => '	
            奈良県奈良市南京終町3-1531',
            'open_time' => '11:30～15:00,
            18:00～21:30',
            'menu' => '鶏そば：850円　ほか',
            'star' => '0',
        ];
        DB::table('shops')->insert($param);
    }
}
