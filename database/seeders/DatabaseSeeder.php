<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(GuestsTableSeeder::class);
        $this->call(FavoritesTableSeeder::class);
        $this->call(FavoriteShopTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(PostShopTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(ShopcategoryShopTableSeeder::class);
        $this->call(ShopcategoriesTableSeeder::class);
        $this->call(PlacesTableSeeder::class);
    }
}
