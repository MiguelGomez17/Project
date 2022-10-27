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

class AdminController extends Controller
{
    public function viewAdmin(){
        $Products = DB::table('products')->where('category','!=','NAN')->paginate(100, ['*'], 'products');
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
                return view('Custom');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

    public function loadImages(Request $request){
        if($request!=null&&Auth::user()){
            if(Auth::user()->type=='admin'){
                $validateData = $request->validate([
                    'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                    'file1' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
                ]);
                $file = $request->file('file');
                $file1 = $request->file('file1');
                $finalPath = 'images/homepage/';
                $fileName = time().'-'.$file->getClientOriginalName();
                $file1Name = time().'-'.$file1->getClientOriginalName();
                File::deleteDirectory(public_path('images/homepage/'));
                $uploadSuccess=$request->file('file')->move($finalPath,$fileName);
                $uploadSuccess=$request->file('file1')->move($finalPath,$file1Name);
                DB::table('main_pages')->truncate();
                $mainPage = new mainPage;
                $mainPage->file=($finalPath.$fileName);
                $mainPage->file1=($finalPath.$file1Name);
                $mainPage->save();
                return redirect('home');
            }
            else{
                return redirect('home');
            }
        }else{
            return redirect('home');
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
                return redirect('admin');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }

}
