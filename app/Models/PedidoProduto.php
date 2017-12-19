<?php

namespace Gelladus\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PedidoProduto extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pedido_produtos';

    protected $fillable = [
        'preco',
        'quantidade',
        'produto_id',
        'pedido_id'
    ];

    protected $casts = [
        'preco' => 'float',
        'quantidade' => 'integer'
    ];

    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }

    public function getPrecoFormartAttribute()
    {
        return "R$ ". number_format($this->preco,2, ',', '.');
    }
}
