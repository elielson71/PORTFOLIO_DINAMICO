<?php

namespace App\Services;

use App\Models\Sessao;
use App\Repositories\Contracts\SessaoRepositoryInterface;
use App\Repositories\Eloquent\SessaoRepository;
use Illuminate\Support\Facades\DB;

class SessaoService {

    /**
     *
     *
     * @var SessaoRepositoryInterface
     */
    protected $sessaoRepository;

    function __construct(SessaoRepositoryInterface $sessaoRepository)
    {
        $this->sessaoRepository = $sessaoRepository;
    }

    public function getAll()
    {
        return $this->sessaoRepository->getAll();
    }

    public function createSessao(array $data)
    {
        return $this->sessaoRepository->create($data);
    }

    public function getSessaoNotLayoutSessao(int $id)
    {
        return $this->sessaoRepository->getAllWithLayout($id);

    }

}
