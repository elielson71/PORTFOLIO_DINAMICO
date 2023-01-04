<?php

namespace App\Repositories\Eloquent;

use App\Models\Sessao;
use App\Repositories\Contracts\SessaoRepositoryInterface;
use Illuminate\Support\Facades\DB;

class SessaoRepository implements SessaoRepositoryInterface
{
    // aqui deve coloca apenas regras relacionada a banco de dados e ORM
    protected $entity;

    public function __construct(Sessao $Sessao)
    {
        $this->entity = $Sessao;
    }


    /**
     * Get all Sessoes
     * @return array
     */
    public function getAll()
    {
        return $this->entity->All();
    }
    /**
     * Get all Sessoes
     * @return array
     */
    public function getAllWithLayout(int $id)
    {

        return DB::select('select * from sessao s where s.id not in ( SELECT sessao_id from layout_sessao ls where ls.layout_id = ?)', [$id]);
    }


    /**
     * Seleciona o Sessao por ID
     * @param int $id
     * @return object
     */
    public function getById(int $id)
    {
        return $this->entity->where('id', $id)->first();
    }

    /**
     * Cria um novo Sessao
     * @param array $Sessao
     * @return object
     */
    public function create(array $Sessao)
    {
        return $this->entity->create($Sessao);
    }

    /**
     *
     */
    public function update(array $data, int $id)
    {
        return $this->entity->update($data);
    }

    /**
     *
     */
    public function destroy(object $Sessao)
    {
        return $Sessao->delete();
    }
}
