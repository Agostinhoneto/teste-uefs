<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {

        $user = new User([
            'name' => 'Agostinho',
            'email' => 'agostinho@example.com',
            'password' => bcrypt('1234'),
        ]);

        $this->assertEquals('Agostinho', $user->name);
        $this->assertEquals('agostinho@example.com', $user->email);

        //$response = $this->get('/');

        //$response->assertStatus(200);
    }
}
