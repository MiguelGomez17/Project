<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

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
                if($row[0]){
                    if($row[1]=='CON')
                    {
                        $imagen='images/category/CON1.png';
                    }
                    elseif (file_exists('images/category/'.$row[1].'.png')) {
                        $imagen='images/category/'.$row[1].'.png';
                    }else{
                        $imagen='images/category/categorySample.png';
                    }
                    self::updateorCreate([
                        'id'=>$index
                    ],[
                        'categoria'=>$row[0],
                        'subcategoria'=>$row[1],
                        'titulo'=>utf8_encode($row[2]),
                        'image'=>$imagen
                    ]);
                }
            }
            $categories = new categories;
            $categories->categoria = '000';
            $categories->subcategoria = 'NAN';
            $categories->titulo = 'Sin categoria';
            $categories->image = 'images/category/categorySample.png';
            $categories->save();
        }
        unlink($file);
    }
}