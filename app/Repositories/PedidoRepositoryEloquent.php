<?php

namespace Gelladus\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Gelladus\Models\Pedido;
use Gelladus\Models\PedidoProduto;
/**
 * Class PedidoRepositoryEloquent
 * @package namespace Gelladus\Repositories;
 */
class PedidoRepositoryEloquent extends BaseRepository implements PedidoRepository
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
        return Pedido::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function delPedidoPoduto($id)
    {
        PedidoProduto::where('pedido_id', $id)->delete();
    }
}
