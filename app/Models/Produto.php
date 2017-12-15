<?php

namespace Gelladus\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Produto extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'preco'
    ];

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class, 'itens_pedidos', 'produto_id', 'pedido_id');
    }

}
