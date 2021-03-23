<?php

use Illuminate\Database\Seeder;
use App\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pedido = new Pedido();
        $pedido->userid='2';
        $pedido->productid='3';
        $pedido->name='Miguel Gomez';
        $pedido->direccion='Calle 1. No 523. Villas 27. Durango, Dgo. Mexico';
        $pedido->entregado=false;
        $pedido->fechapedido='2021-03-07 23:24:50';
        $pedido->fechaentrega=null;
        $pedido->save();
        $pedido2 = new Pedido();
        $pedido2->userid='1';
        $pedido2->productid='2';
        $pedido2->name='Juan Perez';
        $pedido2->direccion='Calle Francisco. No 720. Frac. Felipe. Durango, Dgo. Mexico';
        $pedido2->entregado=false;
        $pedido2->fechapedido='2021-03-15 23:24:50';
        $pedido2->fechaentrega=null;
        $pedido2->save();
    }
}
