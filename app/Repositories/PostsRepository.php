<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{
 
    private $post;

    public function getAllUsers()
    {
        return Post::all();
    }

    public function getPostById($id){
        return Post::findOrFail($id);
    }

    
    public function createPost($id, $user_id, $title, $content)
    {
        try {
            $post = new Post();
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content  = $content;
            $post->save();

            return $post;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $user_id, $title, $content)
    {
        try {
            $post = $this->post->find($id);   
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content  = $content;
            $post->update();
            return $post->fresh();
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function delete($id)
    {
        if($id != null ){
            $post = $this->post->findOrFail($id);
            $post->delete();
        } 
        return $post;  
    }
}

