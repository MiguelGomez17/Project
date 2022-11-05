<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\product;
use App\categories;
use Auth;

class categoryController extends Controller
{
    
    public function viewCategory($category)
    {
        $categoria = categories::where('categoria', $category)->first();
        if($categoria)
        {
            $Products = Product::where('category', 'LIKE', '%'.$category.'%')->where('inventory','>','0')->paginate(10);
            if($Products){
                $title = 'DICES@ | '.$categoria->titulo;
                return view('Category',['products'=>$Products,'categoria'=>$categoria], compact('title'));
            }
        }
        return redirect()->route('home');

    }

    public function viewCatImage($id)
    {
        if(Auth::user()){
            if(Auth::user()->type=='admin'){
                $categoria = categories::find($id);
                if($categoria){
                    $title = 'DICES@ | Imagen para '.$categoria->titulo;
                    return view('CategoryImage',['categoria'=>$categoria],compact('title'));
                }
            }
        }
        return redirect('home');
    }

    public function catEdit(Request $request, $id)
    {
        $validateData = $request->validate([
            'image' => 'nullable|sometimes|max:10000'
        ]);
        $data = request()->all();
        $category = categories::find($id);
        
        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/category/';
            $fileName = $category['categoria'].'.png';
            $uploadSuccess=$data['image']->move($finalPath,$fileName);
            $category->image = ($finalPath.$fileName);
        }else{
            $category->image = 'images/sample/categorySample.png';
        }
        $category->save();
        return redirect('category/'.$category->categoria);
    }
}
