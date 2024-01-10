<?php

namespace App\Repositories;

use App\Models\Tag;

class tagsRepository
{
    public function salvar($name)
    {
        try {
            $tag = new Tag();
            $tag->name = $name;
            $tag->save();
            return $tag;
        } catch (\Exception $e) {
            throw new \Exception($e);
        }
    }
}
