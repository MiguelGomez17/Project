<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\categories;
use Illuminate\Support\Facades\DB;

class Helper
{
    public static function categoria($dato2,$dato3,$dato4,$dato5){
        if($dato5){
            return ($dato2.','.$dato3.','.$dato4.','.$dato5);
        }elseif($dato4){
            return ($dato2.','.$dato3.','.$dato4);
        }elseif($dato3){
            return ($dato2.','.$dato3);
        }else{
            return ($dato2);
        }
    }


    public static function buscar($valor){
        $productCat = str_split($valor, 3);
        $Categorias = DB::table('categories')->where('subcategoria','LIKE','%'.$productCat[0].'%')->get();

        $final = '';
        if($Categorias){
            foreach($Categorias as $category){
                $final .= ($category->categoria).',';
            }    
        }        

        if($final == '')
            return('000');
        else
            return(rtrim($final,','));
    }
}