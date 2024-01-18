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
        $response = Http::get('https://map.yahooapis.jp/search/local/V1/localSearch', [
            'appid' => 'dj00aiZpPWtpOTV0M3BCMTgwdCZzPWNvbnN1bWVyc2VjcmV0Jng9ZDU-',
            'query' => 'ラーメン店 奈良県',
            'output'=> 'json',
            'results' => 100,
        ]);


        foreach ($response['Feature'] as $result) {
            $shopName = $result['Name'];
            $address = $result['Property']['Address'];
            $tel = $result['Property']['Tel1'];

            DB::table('shops')->insert([
                'name' => $shopName,
                'place_id' => 1,
                'image' => 'shop_default.png',
                'holiday' => '-',
                'tel' => $tel,
                'address' => $address,
                'open_time' => '-',
                'menu' => '料理名：価格',
                'star' => '0',
            ]);
        }
    }
}
