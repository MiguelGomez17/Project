<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\categories;
use App\featured;
use App\product;
use Illuminate\Support\Facades\DB;
use Auth;

class Helper
{
    public static function buscar($valor){
        $productCat = str_split($valor, 4);
        $Categorias = DB::table('categories')->where('subcategoria','LIKE','%'.$productCat[0].'%')->get();

        $final = '';
        if($Categorias){
            foreach($Categorias as $category){
                $final .= ($category->categoria).',';
            }
        }
        if($final == '')
        {
            $productCat = str_split($valor, 3);
            $Categorias = DB::table('categories')->where('subcategoria','LIKE','%'.$productCat[0].'%')->get();
            if($Categorias){
                foreach($Categorias as $category){
                    $final .= ($category->categoria).',';
                }
            }
        }

        if($final == '')
            return('000');
        else
            return(rtrim($final,','));
    }

    public static function admin(){
        if(Auth::user())
        {
            if(Auth::user()->type == 'admin'){
                return true;
            }
        }
        return false;
    }

    public static function destacado($brand){
        $featured = DB::table('featureds')->get();
        foreach($featured as $feature){
            if(str_contains($feature->Productos,$brand)){
                return true;
            }
        }
        return false;
    }
    
    public static function Producto($product){
        $Producto = DB::table('products')->where('brand','=',$product)->get();
        return $Producto[0];
    }

    public static function hasProducts($categoria){
        $Producto = Product::where('category', 'LIKE', '%'.$categoria.'%')->where('inventory','>','0')->get();
        //$Producto = DB::table('products')->where('category','LIKE','%'.$categoria.'%')->where('inventory','>','0')->get();
        if($Producto){
            $check = '';
            foreach($Producto as $i=>$Product){
                if($Product->category != $categoria){
                    if(strpos($Product->category,',')){
                        $categorias = explode(',',$Product->category);
                        foreach($categorias as $categoriaL){
                            if($categoriaL == $categoria){
                                $check .= $categoria;
                            }
                        }
                        if($check == ''){
                            unset($Producto[$i]);
                        }
                    }else{
                        unset($Producto[$i]);
                    }
                }
            }
        }
        return $Producto;
    }
}