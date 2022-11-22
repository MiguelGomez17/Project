<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\categories;
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
}