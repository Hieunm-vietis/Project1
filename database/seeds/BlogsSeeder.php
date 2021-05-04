<?php

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Blog::class, 20)->create();
    }
}
