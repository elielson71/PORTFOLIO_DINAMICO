<?php

namespace App\Repositories\Eloquent;

use App\Models\Layout;
use App\Models\LayoutSessao;
use App\Repositories\Contracts\AbstractRepositoryInterface;
use App\Repositories\Contracts\LayoutRepositoryInterface;

class LayoutRepository implements LayoutRepositoryInterface
{
    // aqui deve coloca apenas regras relacionada a banco de dados e ORM
    protected $entity;

    public function __construct(Layout $Layout)
    {
        $this->entity = $Layout;
    }


    /**
     * Get all Layouts
     * @return array
     */
    public function getAll()
    {
        return $this->entity->All();
    }


    /**
     * Seleciona o Layout por ID
     * @param int $id
     * @return object
     */
    public function getById(int $id)
    {

        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria um novo Layout
     * @param array $Layout
     * @return object
     */
    public function create(array $Layout)
    {
        return $this->entity->create($Layout);
    }

    /**
     *
     */
    public function update(array $Layout, int $id)
    {

        return $this->entity->update($Layout);
    }

    /**
     *
     */
    public function updateAndLayoutSessao(Layout $layout, object $data)
    {

        foreach ($data->order as $key => $order) {
            $ls = $this->layoutRepository->getLayoutSessao();
            $layoutSessao = new  LayoutSessao();
            $array = $ls->toArray();
            $array[0]['order_sessao'] = $key;
            $layoutSessao->exists = true;
            $layoutSessao->update($array[0]);
        }
        $layout->fill($request->all());
        $layout->save();
        return $layout;
    }

    /**
     *
     */
    public function destroy(object $Layout)
    {
        return $this->entity->delete();
    }

    public function getLayoutSessao(int $layout_id, int $sessao_id)
    {
        LayoutSessao::where('layout_id', $layout_id)->where('sessao_id', $sessao_id)->get();
    }
}
