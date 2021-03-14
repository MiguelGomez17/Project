<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;

class ProductsController extends Controller
{
    public function viewCategory($category)
    {
        $Product = Product::where('category', $category)->paginate(10);
        if($Product){
            return view('Category',['products'=>$Product,'categoria'=>$category]);
        }else{
            return redirect()->route('home');
        }
    }
}
