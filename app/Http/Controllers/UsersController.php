<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Pedido;
use App\product;
use Helper;

class UsersController extends Controller
{
    public function viewUsers($id)
    {
        if(Auth::user()){
            if(Auth::user()->id==$id||Helper::admin()){
                $User = User::find($id);
                $Pedidos = Pedido::where('userid', $id)->paginate(10);
                $Productos = product::all();
                if($User){
                    $title = 'DICESA | '.$User->name;
                    return view('Users',['Usuario'=>$User,'Pedidos'=>$Pedidos,'Products'=>$Productos], compact('title'));
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function viewVerify()
    {
        return view('auth.verify');
    }
}
