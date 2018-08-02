<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Services\PostService;
use App\Like;
use App\Post; 
use App\User;

class PostServiceTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    protected $user;
    protected $post;
    protected $postService;

    public function setUp()
    {
        parent::setUp();

        $this->user = User::create(
            [
                'name' => $this->faker()->name,
                'password' => str_random(10),
                'email' => $this->faker()->email
            ]
        );

        $this->post = Post::create([
            'content' => 'This is post',
            'tag_id' => 0,
            'user_id' => $this->user->id
        ]);

        $this->postService = new PostService;

        $this->postService->setup($this->post);
    }

    public function testLike()
    {
        // like it
        $this->postService->like($this->user);

        $this->assertEquals(true, $this->postService->liked($this->user));
    }

    public function testUnlike()
    {
        // unlike
       $this->postService->unlike($this->user);

      $this->assertEquals(false, $this->postService->liked($this->user));
    }

    public function createPost()
    {
        $post = $this->postService->addPost(
            $this->user, 
            'test',
            'This is new post'
        );

        $this->assertEquals(false, $post->comment);

        $post->delete();
    }

    public function createPostComment()
    {
        $this->postService->setup($this->post);

        $post = $this->postService->addPost(
            $this->user, 
            'test',
            'This is new post comment'
        );

        $this->assertEquals(true, $post->comment);
        $this->assertEquals($this->post->id, $post->post_id);

        $post->delete();
    }

}
