<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GuestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 10; $i++){
        $param = [
            'name' => $faker->name(),
            'icon' => 'default.png',
            'guest_name' => $faker->userName(),
            'email' => $faker->email(),
            'tel' => $faker->phoneNumber(),
            'password' => $faker->password(),
            'status' => 'ノーマル',
            'created_at' => now(),
            'updated_at' => now(),
        ];
        DB::table('users')->insert($param);
        }
    }
}
