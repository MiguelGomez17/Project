<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
            foreach($data as $row){
                self::updateorCreate([
                    'id'=>$row[0]
                ],[
                    'name'=>$row[1],
                    'description'=>$row[2],
                    'price'=>$row[3],
                    'brand'=>$row[4],
                    'image'=>$row[5],
                    'inventory'=>$row[6],
                    'category'=>$row[7]
                ]);
            }
            unlink($file);
        }
    }
}
