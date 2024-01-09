<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($guestId = 1; $guestId <= 10; $guestId++) {
            for ($i = 1; $i <= 10; $i++) {
                $param = [
                    'guest_id' => $guestId,
                ];

                DB::table('favorites')->insert($param);
            }
        }
    }
}
