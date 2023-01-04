<?php

namespace App\Services;

use App\Models\Layout;
use App\Models\LayoutSessao;
use App\Repositories\Contracts\LayoutRepositoryInterface;
use App\Repositories\Contracts\SessaoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class LayoutService {

    protected $model;
    /**
     *
     *
     * @var LayoutRepositoryInterface|LayoutRepositoryInterface
     */
    protected $layoutRepository;

    /**
     * @var SessaoRepositoryInterface
     */
    protected $sessaoService;

    function __construct(LayoutRepositoryInterface $layoutRepository,SessaoRepositoryInterface $sessaoRepositoryInterface )
    {
        $this->layoutRepository = $layoutRepository;
        $this->sessaoService = new SessaoService($sessaoRepositoryInterface);
    }

    public function getAll()
    {
        return $this->layoutRepository->getAll();
    }

    public function createLayout(array $data)
    {
        return $this->layoutRepository->create($data);
    }

    public function getLayoutSessao(Layout $layout)
    {
        $id = $layout->id;
        $idFilter = filter_var($id,FILTER_SANITIZE_NUMBER_INT);
        $sessoesLayout = $layout->sessao()->orderByPivot('order_sessao')->get();
        $layout['sessoesLayout'] = $sessoesLayout;
        $layout['sessoes'] = $this->sessaoService->getSessaoNotLayoutSessao($id);

    }
    public function updateLayout(Layout $layout,object $data )
    {
        $this->updateAndLayoutSessao($layout, $data);
    }

}
