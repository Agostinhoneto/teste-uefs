<?php

namespace App\Services;

use App\Repositories\PostsRepository;

class PostsService
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getAllPosts()
    {
        return $this->postsRepository->getAllPosts();
    }

    public function getPostById($id)
    {
        return $this->postsRepository->getPostById($id);
    }

    public function createPost(array $data)
    {
        return $this->postsRepository->createPost($data);
    }

    public function updatePost($id, array $data)
    {
        return $this->postsRepository->updatePost($id, $data);
    }

    public function destroyPost($id)
    {
        return $this->postsRepository->destroyPost($id);
    }
}
