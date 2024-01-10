<?php

namespace App\Services;

use App\Repositories\tagsRepository;

class TagsService
{
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getAllTags()
    {
        return $this->tagsRepository->getAllTags();
    }

    public function getTagById($id)
    {
        return $this->tagsRepository->getTagById($id);
    }

    public function createTag(array $data)
    {
        return $this->tagsRepository->createTag($data);
    }

    public function updateTag($id, array $data)
    {
        return $this->tagsRepository->updateTag($id, $data);
    }

    public function destroyTag($id)
    {
        return $this->tagsRepository->destroyTag($id);
    }
}
