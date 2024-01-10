<?php

namespace App\Services;

use App\Repositories\BateriasRepository;
use App\Repositories\PostsRepository;
use Illuminate\Support\Facades\DB;

class PostsService
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function salvar($id,$surfista1,$surfista2)
    {
        DB::beginTransaction();
        try {
            $data = $this->postsRepository->salvar(
                $id,
                $surfista1,
                $surfista2);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
