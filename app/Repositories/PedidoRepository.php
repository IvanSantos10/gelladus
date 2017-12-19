<?php

namespace Gelladus\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ProdutoRepository
 * @package namespace Gelladus\Repositories;
 */
interface PedidoRepository extends RepositoryInterface
{
    public function delPedidoPoduto($id);
}
