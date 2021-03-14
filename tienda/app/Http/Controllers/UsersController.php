<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth;
use App\User;
use App\Pedido;
use App\product;

class UsersController extends Controller
{
    public function viewUsers($id)
    {
        $User = User::find($id);
        $Pedidos = Pedido::where('userid', $id)->paginate(10);
        $Productos = product::all();
        if($User){
            return view('Users',['Usuario'=>$User,'Pedidos'=>$Pedidos,'Products'=>$Productos]);
        }else{
            return redirect()->route('home');
        }
    }
}
