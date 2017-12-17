<?php

namespace Gelladus\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Gelladus\Models\Produto;
/**
 * Class ProdutoRepositoryEloquent
 * @package namespace Gelladus\Repositories;
 */
class ProdutoRepositoryEloquent extends BaseRepository implements ProdutoRepository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'=>'like'
    ];
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Produto::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
