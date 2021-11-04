<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Pedido;
use App\product;
use App\User;

class AdminController extends Controller
{
    public function viewAdmin(){
        $Products = DB::table('products')->paginate(10, ['*'], 'products');
        $Users = DB::table('users')->paginate(10, ['*'], 'users');
        $Pedidos = DB::table('pedidos')->paginate(10, ['*'], 'pedidos');

        
        $Productos = product::all();
        $Usuarios = User::all();
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                return view('Admin',['Products'=>$Products,'Pedidos'=>$Pedidos,'Users'=>$Users,'Productos'=>$Productos,'Usuarios'=>$Usuarios]);
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function viewCustom(){
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                return view('custom');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function upgrade($id){
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                $User = User::find($id);
                if($User->type=='admin'){
                    $User->type='user';
                }else{
                    $User->type='admin';
                }
                $User->save();
                return redirect('/admin');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

}
