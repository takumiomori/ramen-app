<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('http://webservice.recruit.co.jp/hotpepper/gourmet/v1/', [
            'key' => '31540da67f7a1427',
            'large_area' => 'Z025',
            'genre' => 'G013', 
            'count' => '100',
            'format' => 'json'
        ]);

        foreach ($response['results']['shop'] as $shop) {
            DB::table('shops')->insert([
                'name' => $shop['name'],
                'place_id' => 1,
                'image' => 'shop_default.png',
                'holiday' => $shop['close'],
                'tel' => 'なし',
                'address' => $shop['address'],
                'open_time' => $shop['open'],
                'menu' => '料理名：価格',
                'star' => '0',
            ]);
        }
    }
}
