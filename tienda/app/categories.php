<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Helper;

class categories extends Model
{
    protected $fillable = [
        'categoria', 'subcategoria', 'titulo', 'image'
    ];

    protected $guarded=[];
    public function importToDb()
    {
        $path = resource_path('pending-files/*csv');
        $g = glob($path);
        foreach(array_slice($g, 0, 2) as $file){
            $data = array_map('str_getcsv', file($file));
            DB::table('categories')->truncate();
            set_time_limit(7200);
            foreach($data as $index => $row){
                if($row[1]){
                    if (file_exists('images/category/'.$row[0].'.png')) {
                        $imagen='images/category/'.$row[0].'.png';
                    }else{
                        $imagen='images/category/categorySample.png';
                    }
                    $categorias = array_slice($row,2);
                    $categoria = '';
                    foreach($categorias as $cat){
                        $categoria .= $cat.',';
                    }
                    self::updateorCreate([
                        'id'=>$index
                    ],[
                        'categoria'=>$row[0],
                        'subcategoria'=>$categoria,
                        'titulo'=>utf8_encode($row[1]),
                        'image'=>$imagen
                    ]);
                }
            }
            $categories = new categories;
            $categories->categoria = '000';
            $categories->subcategoria = 'NAN';
            $categories->titulo = 'Otros';
            $categories->image = 'images/category/categorySample.png';
            $categories->save();
        }
        unlink($file);
    }
}