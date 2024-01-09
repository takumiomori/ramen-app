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
        for ($i = 1; $i <= 17; $i++) {
            for ($guestId = 1; $guestId <= 10; $guestId++) {
                $param = [
                    'guest_id' => $guestId,
                    'post_text' => $this->generateRandomComment(),
                    'star' => rand(1.00, 5.00),
                ];

                DB::table('posts')->insert($param);
            }
        }
    }

    private function generateRandomComment()
    {
        $comments = [
            '美味しかったです！',
            'リーズナブルで満足。',
            'サービスが良い。',
            '麺の歯ごたえが絶妙。',
            'スープの味が好み。',
            '店内の雰囲気が良い。',
            '量が多すぎずちょうど良い。',
            '辛さがちょうどよかった。',
            'リピートしたい。',
            '普通のラーメン。',
        ];

        return $comments[array_rand($comments)];
    }

}
