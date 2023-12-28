<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $response = Http::get('https://geoapi.heartrails.com/api/json?method=getCities&prefecture=%E5%A5%88%E8%89%AF%E7%9C%8C');

        $apiData=$response->json();


        foreach ($apiData['response']['location'] as $location) {
            DB::table('places')->insert([
                'name' => $location['city'],
            ]);
    }
}
}