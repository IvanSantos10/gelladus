<?php

namespace Gelladus\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Pedido extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'pedidos';

    protected $fillable = [
        'status',
        'quantidade',
        'user_id'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function produtos()
    {
        return $this->hasMany(PedidoProduto::class);
    }

    public function getTotalAttribute()
    {
        $pedidos = $this->produtos;
        $preco = $qnt = 0;

        foreach ($pedidos as $pedido){
            $preco += $pedido->quantidade * $pedido->preco;
        }

        return "R$ ". number_format($preco,2, ',', '.');
    }
}
