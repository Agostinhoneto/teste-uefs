<?php

namespace App\Services;

use App\Repositories\PostsRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class PostsService
{
    private $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getById($id)
    {
        return $this->postsRepository
            ->getPostById($id);
    }

    public function createPost($id, $user_id, $title, $content)
    {
        DB::beginTransaction();
        try {
            $data = $this->postsRepository->createPost($id,$user_id, $title, $content);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function updatePost($id, $user_id, $title, $content)
    {
        DB::beginTransaction();
        try {
            $data = $this->postsRepository->update($id, $user_id, $title, $content);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function destroy($id){
        DB::beginTransaction();
        try{
            DB::commit();
            $user = $this->postsRepository->delete($id);
        }
        catch(Exception $e){
            DB::roolBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Não pode ser deletado');
        }
        return $user;
    }
}
