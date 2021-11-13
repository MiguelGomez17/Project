<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Pedido;
use App\product;

class PedidosController extends Controller
{
    public static $saveid;
    public function viewComprar($id)
    {
        $Product = Product::find($id);
        $GLOBALS['saveid'] = $id;
        if($Product){
            return view('Comprar',['Product'=>$Product]);
        }else{
            return redirect()->route('home');
        }
    }
    
    public function create(Request $request, $id){
        $validateData = $request->validate([
            'name' => 'required',
            'calle' => 'required',
            'numero' => 'required|numeric',
            'fraccionamiento' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'zipcode' => 'required|numeric'
        ]);
        $data = request()->all();
        $pedido = new Pedido;
        $pedido->name = $data['name'];
        $pedido->direccion = $data['calle'] . " " . $data['numero'] . ". " . $data['fraccionamiento'] . " " . $data['ciudad'] . " " . $data['pais'] . " " . $data['zipcode'];
        $pedido->userid = Auth::user()->id;
        $pedido->productid = $id;
        $pedido->entregado = false;
        $pedido->fechapedido = now();
        $pedido->fechapedido = null;
        $pedido->save();
        $Product = product::find($id);
        $Product->inventory = ($Product->inventory)-1;
        $Product->save();
        return redirect('/home');
    }
    public function entrega($id){
        $Pedido = Pedido::find($id);
        $Pedido->entregado = true;
        $Pedido->fechaentrega = now();
        $Pedido->save();
        return redirect('/admin');

    }
}
