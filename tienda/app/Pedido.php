<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //protected $table = "pedidos"
    protected $fillable = [
        'userid', 'productid', 'name','direccion', 'entregado', 'fechapedido', 'fechaentrega'
    ];
}
