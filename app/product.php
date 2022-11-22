<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helper;

class product extends Model
{
    protected $fillable = [
        'description', 'price', 'brand', 'image', 'inventory', 'category', 'featured'
    ];

    protected $guarded=[];
    public function importToDb()
    {
        $path = resource_path('pending-files/*csv');
        $g = glob($path);
        foreach(array_slice($g, 0, 2) as $file){
            $data = array_map('str_getcsv', file($file));
            DB::table('products')->truncate();
            set_time_limit(7200);
            foreach($data as $index => $row){
                if($row[0]){
                    if(substr($row[3], -1)!="X" && strtok($row[1],' ') != "SERVICIO" && $row[0] != 'GEN')
                    {
                        if (file_exists('images/products/'.$row[0].'.png')) {
                            $imagen='images/products/'.$row[0].'.png';
                        }else{
                            $imagen='images/sample/productSample.png';
                        }
                        self::updateorCreate([
                            'id'=>$index
                        ],[
                            'description'=>utf8_encode($row[1]),
                            'price'=>$row[4],
                            'brand'=>$row[0],
                            'image'=>$imagen,
                            'inventory'=>$row[2],
                            'category'=>Helper::buscar($row[0]),
                            'featured'=>null
                        ]);
                    }
                }
            }
            unlink($file);
        }
    }
}
