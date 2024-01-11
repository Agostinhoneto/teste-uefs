<?php

namespace App\Services;

use App\Repositories\tagsRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use InvalidArgumentException;

class TagsService
{
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function getById($id)
    {
        return $this->tagsRepository
            ->getById($id);
    }

    public function getUserById($id)
    {
        return $this->tagsRepository->getById($id);
    }

    public function createTag($id, $name)
    {
        DB::beginTransaction();
        try {
            $data = $this->tagsRepository->salvar($id, $name);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }

    public function updateTag($id, $name)
    {
        DB::beginTransaction();
        try {
            $data = $this->tagsRepository->update($id, $name);
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
            $user = $this->tagsRepository->delete($id);
        }
        catch(Exception $e){
            DB::roolBack();
            Log::info($e->getMessage());
            throw new InvalidArgumentException('Não pode ser deletado');
        }
        return $user;
    }
}
