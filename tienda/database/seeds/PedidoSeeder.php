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
        $pedido->productid='ACABO';
        $pedido->cantidad='2';
        $pedido->total='150';
        $pedido->comprado=false;
        $pedido->fechaCompra=null;
        $pedido->save();
        $pedido2 = new Pedido();
        $pedido2->userid='1';
        $pedido2->productid='ASDASAV';
        $pedido2->cantidad='1';
        $pedido2->total='720';
        $pedido2->comprado=true;
        $pedido2->fechaCompra='2021-03-15 23:24:50';
        $pedido2->save();
    }
}
