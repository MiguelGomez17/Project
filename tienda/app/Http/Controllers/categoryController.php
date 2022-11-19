<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\product;
use App\categories;
use Auth;
use Helper;

class categoryController extends Controller
{
    
    public function viewCategory($category)
    {
        $categoria = categories::where('categoria', $category)->first();
        if($categoria)
        {
            if($categoria->categoria != 000 && ($category == '100'||$category % 100 == 0))
            {
                return redirect()->route('home');
            }else{
                $Products = Product::where('category', 'LIKE', '%'.$category.'%')->where('inventory','>','0')->paginate(10);
                if($Products){
                    $check = '';
                    foreach($Products as $i=>$Product){
                        if($Product->category != $category){
                            if(strpos($Product->category,',')){
                                $categorias = explode(',',$Product->category);
                                foreach($categorias as $categoriaL){
                                    if($categoriaL == $category){
                                        $check .= $category;
                                    }
                                }
                                if($check == ''){
                                    unset($Products[$i]);
                                }
                            }else{
                                unset($Products[$i]);
                            }
                        }
                    }
                    $title = 'DICES@ | '.$categoria->titulo;
                    return view('Category',['products'=>$Products,'categoria'=>$categoria], compact('title'));
                }
            }
        }
        return redirect()->route('home');

    }

    public function viewCatImage($id)
    {
        if(Helper::admin()){
            $categoria = categories::find($id);
            if($categoria){
                $title = 'DICES@ | Imagen para '.$categoria->titulo;
                return view('CategoryImage',['categoria'=>$categoria],compact('title'));
            }
        }
        return redirect('home');
    }

    public function catEdit(Request $request, $id)
    {
        if(Helper::admin())
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
        }
        return redirect('category/'.$category->categoria);
    }
}
