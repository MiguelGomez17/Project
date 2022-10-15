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
    public function viewProduct($brand)
    {
        $Product = Product::find($brand);
        if($Product){
            if(($Product->inventory>0)||(Auth::user()&&Auth::user()->type=='admin')){
                $title = 'DICES@ | '.$Product->description;
                return view('Product',['Product'=>$Product], compact('title'));
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
            /*if(Auth::User()->type=='admin'){
                $Products = Product::where('category', $category)->paginate(20);
            }else*/{
                $Products = Product::where('category', $category)->where('inventory','>','0')->paginate(20);
            }
        }else{
            $Products = Product::where('category', $category)->where('inventory','>','0')->paginate(20);
        }
        if($Products){
            $title = 'DICES@ | '.$category;
            return view('Category',['products'=>$Products,'categoria'=>$category], compact('title'));
        }else{
            return redirect()->route('home');
        }
    }

    public function viewGamer()
    {
        if(Auth::User()){
            /*if(Auth::User()->type=='admin'){
                $Products = Product::where('description','LIKE','%GAMER%')->paginate(20);
            }else*/{
                $Products = Product::where('description','LIKE','%GAMER%')->where('inventory','>','0')->paginate(20);
            }
        }else{
            $Products = Product::where('description','LIKE','%GAMER%')->where('inventory','>','0')->paginate(20);
        }
        if($Products){
            $title = 'DICES@ | ZONA GAMER';
            return view('Category',['products'=>$Products,'categoria'=>'Zona Gamer'], compact('title'));
        }else{
            return redirect()->route('home');
        }
    }

    public function Search(Request $request){
        $texto=trim($request->get('search'));
        
        if(Auth::User()){
            /*if(Auth::User()->type=='admin'){
                $resultado = DB::table('products')->where('description','LIKE','%'.$texto.'%')->orwhere('brand','LIKE','%'.$texto.'%')->paginate(10);
            }else*/{
                $resultado = DB::table('products')->where('description','LIKE','%'.$texto.'%')->where('inventory','>','0')->orwhere('brand','LIKE','%'.$texto.'%')->paginate(10);
            }
        }else{
            $resultado = DB::table('products')->where('description','LIKE','%'.$texto.'%')->where('inventory','>','0')->orwhere('brand','LIKE','%'.$texto.'%')->paginate(10);
        }
        $title = 'DICES@ | '.$texto;
        return view('Search',['resultados'=>$resultado, 'Busqueda'=>$texto], compact('title'));
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
            'description' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'image' => 'nullable|sometimes',
            'inventory' => 'required|numeric',
            'category' => 'required'
        ]);
        $data = request()->all();
        $product = new product;
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand = $data['brand'];

        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/products/';
            $fileName = $data['brand'].'.png';
            $uploadSuccess=$data['image']->move($finalPath,$fileName);
            $product->image = ($finalPath.$fileName);
        }else if (file_exists('images/products/'.$data['brand'].'.png')) {
            $product->image = 'images/products/'.$data['brand'].'.png';
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
            'description' => 'required',
            'price' => 'required|numeric',
            'brand' => 'required',
            'image' => 'nullable|sometimes|max:10000',
            'inventory' => 'required|numeric',
            'category' => 'required'
        ]);
        $data = request()->all();
        $product = Product::find($id);
        $product->description = $data['description'];
        $product->price = $data['price'];
        $product->brand = $data['brand'];

        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/products/';
            $fileName = $data['brand'].'.png';
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
