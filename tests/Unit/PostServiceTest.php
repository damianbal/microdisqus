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

        $this->postService->setup($this->post, $this->user);
    }

    public function testLike()
    {
        // like it
        $this->postService->like();

        $this->assertEquals(true, $this->postService->liked());
    }

    public function testUnlike()
    {
        // unlike
        $this->postService->unlike();

        $this->assertEquals(false, $this->postService->liked());
    }

}
