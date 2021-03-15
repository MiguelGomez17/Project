<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'brand', 'image', 'inventory', 'category'
    ];
}
