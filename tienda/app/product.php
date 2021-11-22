<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Helper;

class product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'brand', 'image', 'inventory', 'category'
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
                    self::updateorCreate([
                        'id'=>$index
                    ],[
                        'name'=>$row[1],
                        'description'=>$row[1],
                        'price'=>$row[4],
                        'brand'=>$row[3],
                        'image'=>'images/sample/productSample.png',
                        'inventory'=>$row[2],
                        'category'=>Helper::buscar($row[1])
                    ]);
                }
            }
            unlink($file);
        }
    }
}
