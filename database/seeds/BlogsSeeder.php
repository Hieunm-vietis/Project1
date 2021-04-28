<?php

use Illuminate\Database\Seeder;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 20; $i++) {
            DB::table('blogs')->insert([
                'title' => Str::random(10),
                'content' => Str::random(100),
                'user_id' => random_int(0, 3),
                'image' => 'https://imgd.aeplcdn.com/476x268/n/cw/ec/38904/mt-15-front-view.jpeg?q=80'
            ]);
        }
    }
}
