<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class featured extends Model
{
    protected $fillable = [
        'Menu', 'Productos'
    ];
}
