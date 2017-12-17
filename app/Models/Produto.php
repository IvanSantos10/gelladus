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

    protected $casts = [
        'preco' => 'float',
    ];

    public function estoques()
    {
        return $this->hasMany(Estoque::class);
    }

    public function getPrecoFormartAttribute()
    {
        return "R$ ". number_format($this->preco,2, ',', '.');
    }



}
