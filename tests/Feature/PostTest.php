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
    public function post_test(): void
    {

       // $user = User::find(1);

        $post = new Post([
            'title' => 'Post de Agostinho',
            'content' => 'teste de content.',
            'user_id' => 1,
        ]);

        $this->assertEquals('Testando Post', $post->title);
        $this->assertEquals('Testando content.', $post->content);
        $this->assertEquals('Usuário cadastrante', $post->user_id);

        //$response = $this->get('/');

        //$response->assertStatus(200);
    }
}
