<?php

namespace Gelladus\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Gelladus\Repositories\ProdutoRepository;
use Gelladus\Models\Produto;
use Gelladus\Validators\ProdutoValidator;

/**
 * Class ProdutoRepositoryEloquent
 * @package namespace Gelladus\Repositories;
 */
class ProdutoRepositoryEloquent extends BaseRepository implements ProdutoRepository
{
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
