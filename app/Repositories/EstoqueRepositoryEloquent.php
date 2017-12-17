<?php

namespace Gelladus\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Gelladus\Models\Estoque;

/**
 * Class ProdutoRepositoryEloquent
 * @package namespace Gelladus\Repositories;
 */
class EstoqueRepositoryEloquent extends BaseRepository implements EstoqueRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'lote',
        'quantidade',
        'produto.nome',
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Estoque::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
