<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $user = User::factory()->create();
        $post = Post::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertInstanceOf(Post::class, $post);
        $this->assertEquals($user->id, $post->user_id);

    }
}
