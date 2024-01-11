<?php

namespace Tests\Feature;

use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TagTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $tag = Tag::factory()->create();

        $this->assertInstanceOf(Tag::class, $tag);
        
    }
}
