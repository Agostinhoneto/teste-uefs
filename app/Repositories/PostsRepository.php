<?php

namespace App\Repositories;

use App\Models\Post;


class PostsRepository
{
 
    private $post;

    public function getAll()
    {
        return Post::all();
    }

    public function getPostById($id)
    {
        return Post::findOrFail($id);
    }

    
    public function createPost($user_id, $title, $content,$tags)
    {
       
        try {
            $post = new Post();
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content  = $content;
            $post->save();
            $post->tags()->sync($tags);  
            return $post;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }

    public function update($id, $user_id, $title, $content,$tags)
    {
        try {
            $post = new Post();
            $post->$id = $id;  
            $post->user_id = $user_id;
            $post->title = $title;
            $post->content  = $content;
            $post->update();
            $post->tags()->sync($tags);
          
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

