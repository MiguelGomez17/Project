<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\product;
use App\categories;
use Auth;

class ProductsController extends Controller
{
    /* Vistas de producto, lista de productos y categorias */
    public function viewProduct($brand)
    {
        $Product = Product::find($brand);
        if($Product){
            if(($Product->inventory>0)/*||(Auth::user()&&Auth::user()->type=='admin')*/){
                $title = 'DICES@ | '.$Product->description;
                return view('Product',['Product'=>$Product], compact('title'));
            }
        }
        return redirect()->route('home');
    }
    public function viewProducts()
    {
        $Products = DB::table('products')->paginate(1000);
        if($Products){
            return view('Products',['products'=>$Products]);
        }else{
            return redirect()->route('home');
        }
    }
    public function viewCategory($category)
    {
        if(!is_numeric($category))
        {
            $categoria = categories::where('subcategoria', $category)->first();
        }            
        else
        {
            $categoria = categories::where('categoria', $category)->first();
        }
        if($categoria)
        {
            $Products = Product::where('category', $categoria->subcategoria)->where('inventory','>','0')->paginate(1000);
            if($Products){
                $title = 'DICES@ | '.$categoria->titulo;
                return view('Category',['products'=>$Products,'categoria'=>$categoria], compact('title'));
            }
        }
        return redirect()->route('home');

    }

    public function Search(Request $request){
        $texto=trim($request->get('search'));
        $resultado = DB::table('products')
                ->where('description','LIKE','%'.$texto.'%')
                ->where('inventory','>','0')
                ->orwhere('brand','LIKE','%'.$texto.'%')
                ->paginate(1000);
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
                }
            }
        }
        return redirect()->route('home');
    }

    public function Delete($id)
    {
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                $Product = Product::find($id);
                $Product->delete();
                return redirect('home');
            }
        }
        return redirect('home');
    }

    public function viewCatImage($id)
    {
        if(Auth::user()){
            if(Auth::user()->type=='admin'){
                $categoria = categories::find($id);
                if($categoria){
                    $title = 'DICES@ | Imagen para '.$categoria->titulo;
                    return view('CategoryImage',['categoria'=>$categoria],compact('title'));
                }
            }
        }
        return redirect('home');
    }

    /* Vistas para editar producto */
    public function viewEdit($id)
    {
        if(Auth::user()){
            if(Auth::user()->type==='admin'){
                $Product = Product::find($id);
                if($Product){
                    $title = 'DICES@ | Editar '.$Product->brand;
                    return view('EditProduct',['Product'=>$Product],compact('title'));
                }
            }
        }
        return redirect()->route('home');
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
        }elseif (file_exists('images/products/'.$data['brand'].'.png'))
        {
            $product->image = 'images/products/'.$data['brand'].'.png';
        }        
        else{
            $product->image = 'images/sample/productSample.png';
        }
        
        $product->inventory = $data['inventory'];
        $product->category = $data['category'];
        $product->save();
        return redirect('product/'.$id);
    }

    public function catEdit(Request $request, $id)
    {
        $validateData = $request->validate([
            'image' => 'nullable|sometimes|max:10000'
        ]);
        $data = request()->all();
        $category = categories::find($id);
        
        if(isset($data['image']))
        {
            $file = $data['image'];
            $finalPath = 'images/category/';
            if($category['subcategoria']=='CON')
                $fileName = $category['subcategoria'].'1.png';
            else
                $fileName = $category['subcategoria'].'.png';
            $uploadSuccess=$data['image']->move($finalPath,$fileName);
            $category->image = ($finalPath.$fileName);
        }else{
            $category->image = 'images/sample/categorySample.png';
        }
        $category->save();
        return redirect('category/'.$category->subcategoria);
    }
}
