<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //protected $table = "pedidos"
    protected $fillable = [
        'userid', 'productid', 'cantidad','total', 'comprado', 'fechaCompra'
    ];
}
