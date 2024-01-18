<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('favorite_shop')->delete();
        DB::unprepared("ALTER TABLE favorite_shop AUTO_INCREMENT = 1 ");
        $favoriteId = 1;
        for ($i = 1; $i <= 10; $i++) {
            $selectedShops = $this->getRandomShops(100, 30);

            foreach ($selectedShops as $shopId) {
                $param = [
                    'favorite_id' => $favoriteId++,
                    'shop_id' => $shopId,
                ];

                DB::table('favorite_shop')->insert($param);
            }

            }
    }

    private function getRandomShops($totalShops, $count)
    {
        $shops = range(1, $totalShops);
        shuffle($shops);

        return array_slice($shops, 0, $count);
    }
}
