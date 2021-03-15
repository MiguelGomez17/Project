<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Auth;
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
    public function viewProduct($id)
    {
        $Product = Product::find($id);
        if($Product){
            return view('Product',['Product'=>$Product]);
        }else{
            return redirect()->route('home');
        }
    }
    public function viewProducts()
    {
        $Products = DB::table('products')->paginate(20);
        if($Products){
            return view('Products',['products'=>$Products]);
        }else{
            return redirect()->route('home');
        }
    }
    public function viewDelete($id)
    {
        $Product = Product::find($id);
        if($Product){
            return view('Delete',['Product'=>$Product]);
        }else{
            return redirect()->route('home');
        }
    }
    public function Delete($id)
    {
        $Product = Product::find($id);
        $Product->delete();
        return redirect('/home');
    }
}
