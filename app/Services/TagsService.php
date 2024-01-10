<?php

namespace App\Services;

use App\Repositories\OndasRepository;
use App\Repositories\tagsRepository;
use Illuminate\Support\Facades\DB;

class TagsService
{
    private $tagsRepository;

    public function __construct(tagsRepository $tagsRepository)
    {
        $this->tagsRepository = $tagsRepository;
    }

    public function salvar($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->tagsRepository->salvar($id);
            DB::commit();
            return $data;
        } catch (\Exception $e) {
            DB::rollback();
            throw new \Exception($e);
        }
    }
}
