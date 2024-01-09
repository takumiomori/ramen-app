<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'name' => '醤油',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '豚骨',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '塩',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '味噌',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '鶏白湯',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '天理',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '家系',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '二郎系・二郎インスパイア系',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '魚介',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => 'つけ麺',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '油そば',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => 'まぜそば',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => '担々麺',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => 'スタミナ',
        ];
        DB::table('shopcategories')->insert($param);

        $param = [
            'name' => 'その他',
        ];
        DB::table('shopcategories')->insert($param);
    }
}
