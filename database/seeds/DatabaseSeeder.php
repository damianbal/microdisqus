<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Like;
use App\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20)->create();
    }
}
