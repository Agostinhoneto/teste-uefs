<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $posts = Post::all();

          foreach ($posts as $post) {
              $tags = Tag::inRandomOrder()->limit(rand(1, 3))->get(); 
              $post->tags()->attach($tags);
          }
    }
}
