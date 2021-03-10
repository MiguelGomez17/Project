<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductsController extends Controller
{
    public function viewCategory($Category)
    {
        $Product = Product::where('Category', $Category)->paginate(10);
        if($Product){
            return view('Category',['products'=>$Product,'categoria'=>$Category]);
        }else{
            return redirect()->route('home');
        }
    }
}
