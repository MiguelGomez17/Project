<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Pedido;
use App\product;
use App\User;
use App\categories;
use App\mainPage;
use Helper;

class AdminController extends Controller
{
    public function viewAdmin(){
        $Products = DB::table('products')
            ->where('inventory','>','0')
            ->paginate(10000, ['*'], 'products');
        $Users = DB::table('users')->paginate(10, ['*'], 'users');
        $Pedidos = DB::table('pedidos')->paginate(10, ['*'], 'pedidos');
        
        $Productos = product::all();
        $Usuarios = User::all();
        if(Helper::admin()){
            return view('Admin',['Products'=>$Products,'Pedidos'=>$Pedidos,'Users'=>$Users,'Productos'=>$Productos,'Usuarios'=>$Usuarios]);
        }else{
            return redirect()->route('home');
        }
    }

    public function viewCustom(){
        $imagenes = mainPage::all();
        if(Helper::admin()){
            return view('Custom',['imagenes'=>$imagenes]);
        }else{
            return redirect()->route('home');
        }
    }

    public function customDelete($id){
        if(Helper::admin()){
            $imagen = mainPage::find($id);
            if($imagen)
            {
                File::delete($imagen->file);
                $imagen->delete();
            }
            $imagenes = mainPage::all();
            return view('Custom',['imagenes'=>$imagenes]);
        }else{
            return redirect()->route('home');
        }
    }

    public function loadImages(Request $request){
        if($request!=null&&Helper::admin()){
            $validateData = $request->validate([
                'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);
            $file = $request->file('file');
            $file1 = $request->file('file1');
            $finalPath = 'images/homepage/';
            $fileName = 'BANNER'.time().'.png';
            $uploadSuccess=$request->file('file')->move($finalPath,$fileName);
            $mainPage = new mainPage;
            $mainPage->file=($finalPath.$fileName);
            $mainPage->save();
            return redirect('custom');
        }else{
            return redirect('home');
        }
    }

    public function registrar(Request $request){
        if(Helper::admin()){
            return $request;
        }
    }

    public function upgrade($id){
        if(Helper::admin()){
            $User = User::find($id);
            if($User->type=='admin'){
                $User->type='user';
            }else{
                $User->type='admin';
            }
            $User->save();
            return redirect('admin');
        }else{
            return redirect()->route('home');
        }
    }

}
