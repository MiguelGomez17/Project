<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\product;
use Auth;

class ProductsController extends Controller
{
    /* Vistas de producto, lista de productos y categorias */
    public function viewProduct($id)
    {
        $Product = Product::find($id);
        if($Product){
            if(Auth::user()&&Auth::user()->type=='admin'){
                return view('Product',['Product'=>$Product]);
            }else{
                return redirect()->route('home');
            }
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
    public function viewCategory($category)
    {
        if(Auth::User()){
            if(Auth::User()->type=='admin'){
                $Products = Product::where('category', $category)->paginate(20);
            }else{
                $Products = Product::where('category', $category)->where('inventory','>','0')->paginate(20);
            }
        }else{
            $Products = Product::where('category', $category)->where('inventory','>','0')->paginate(20);
        }
        if($Products){
            return view('Category',['products'=>$Products,'categoria'=>$category]);
        }else{
            return redirect()->route('home');
        }
    }

    public function Search(Request $request){
        $texto=trim($request->get('search'));
        if(Auth::User()){
            if(Auth::User()->type=='admin'){
                $resultado = DB::table('products')->where('name','LIKE','%'.$texto.'%')->paginate(1000);
            }else{
                $resultado = DB::table('products')->where('name','LIKE','%'.$texto.'%')->where('inventory','>','0')->paginate(1000);
            }
        }else{
            $resultado = DB::table('products')->where('name','LIKE','%'.$texto.'%')->where('inventory','>','0')->paginate(1000);
        }
        return view('Search',['resultados'=>$resultado]);
    }


    
    /* Vistas de agregar producto */
    public function viewCreate()
    {
        if(Auth::user()){
            if(Auth::user()->type=='admin'){
                return view('CreateProduct');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
    public function create(Request $request){
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'image' => 'nullable|sometimes|max:10000',
            'inventory' => 'required|numeric',
            'category' => 'required'
        ]);
        $data = request()->all();
        $product = new product;
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand = $data['brand'];

        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/products/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$data['image']->move($finalPath,$fileName);
            $product->image = ($finalPath.$fileName);
        }else{
            $product->image = 'images/sample/productSample.png';
        }
        
        $product->inventory = $data['inventory'];
        $product->category = $data['category'];
        $product->save();
        return redirect('/product');
    }


    /* Vistas para eliminar producto */
    public function viewDelete($id)
    {
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                $Product = Product::find($id);
                if($Product){
                    return view('Delete',['Product'=>$Product]);
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('home');
            }
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

    /* Vistas para editar producto */
    public function viewEdit($id)
    {
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                $Product = Product::find($id);
                if($Product){
                    return view('EditProduct',['Product'=>$Product]);
                }else{
                    return redirect()->route('home');
                }
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('home');
        }
    }
    public function Edit(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'image' => 'nullable|sometimes|max:10000',
            'inventory' => 'required|numeric',
            'category' => 'required'
        ]);
        $data = request()->all();
        $product = Product::find($id);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand = $data['brand'];

        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/products/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uploadSuccess=$data['image']->move($finalPath,$fileName);
            $product->image = ($finalPath.$fileName);
        }else{
            $product->image = 'images/sample/productSample.png';
        }
        
        $product->inventory = $data['inventory'];
        $product->category = $data['category'];
        $product->save();
        return redirect('product/'.$id);
    }
}
