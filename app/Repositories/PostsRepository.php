<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{
    public function salvar($id)
    {
        try {
            $post = new Post();
            $post->id = $id;
            $post->save();

            return $post;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
