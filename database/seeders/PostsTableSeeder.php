<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $param = [
            'guest_id' => 1,
            'post_text'=> '美味しい。とにかく美味しい。',
        ];
        DB::table('posts')->insert($param);
    }
}
