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
        // $this->call(UsersTableSeeder::class);

        $tag = Tag::create([
            'name' => ''
        ]);

        // create user
        $damian = User::create([
            'name' => 'Damian',
            'password' => bcrypt('damian'),
            'admin' => true,
            'email' => 'damian@damianbalandowski.com',
        ]);

        // create post
        $post = Post::create([
            'content' => 'This is first post on that site, yup!',
            'user_id' => $damian->id,
            'tag_id' => $tag->id
        ]);

        // add the like 
        $like = Like::create([
            'user_id' => $damian->id, 
            'post_id' => $post->id
        ]);
    }
}
