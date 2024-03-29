<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\product;
use App\categories;
use App\featured;
use Auth;
use Helper;

class ProductsController extends Controller
{
    /* Vistas de producto, lista de productos y categorias */
    public function viewProduct($brand)
    {
        $Product = DB::table('products')->where('brand','=',$brand)->first();
        if($Product){
            if(($Product->inventory>0)||(Helper::admin())){
                $title = 'DICESA | '.$Product->description;
                return view('Product',['Product'=>$Product], compact('title'));
            }
        }
        return redirect()->route('home');
    }
    public function viewProducts()
    {
        $Products = DB::table('products')
            //->where('image','=', 'images/sample/productSample.png')
            //->where('category','=', '000')
            ->where('inventory','>', '0')
            ->paginate(25);
        $Categorias = categories::all();
        if($Products){
            return view('Products',['products'=>$Products, 'Categorias'=>$Categorias]);
        }else{
            return redirect()->route('home');
        }
    }

    public function Search(Request $request){
        $texto=trim($request->get('search'));
        $texto=trim($texto,'{');
        $texto=trim($texto,'}');
        $texto=trim($texto,'$');
        $categorias = DB::table('categories')
            ->where('titulo','LIKE','%'.$texto.'%')
            ->get();
        $resultado = DB::table('products')
            ->where('inventory','>','0')
            ->where('description','LIKE','%'.$texto.'%')
            ->orwhere('brand','LIKE','%'.$texto.'%')
            ->get();
        $title = 'DICESA | '.$texto;
        return view('Search',['resultados'=>$resultado,'categorias'=>$categorias, 'Busqueda'=>$texto], compact('title'));
    }

    
    /* Vistas de agregar producto */
    public function viewCreate()
    {
        if(Helper::admin()){
            return view('CreateProduct');
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
    public function viewDelete($brand)
    {
        if(Helper::admin()){
            $Product = DB::table('products')->where('brand','=',$brand)->first();
            if($Product){
                $title = 'DICESA | Eliminar '.$Product->brand;
                return view('Delete',['Product'=>$Product], compact('title'));
            }
        }
        return redirect()->route('home');
    }

    public function Delete($brand)
    {
        if(Helper::admin()){
            $Product = DB::table('products')->where('brand','=',$brand)->first();
            $Product->delete();
            return redirect('home');
        }
        return redirect('home');
    }

    /* Vistas para editar producto */
    public function viewEdit($brand)
    {
        if(Helper::admin()){
            $Product = DB::table('products')->where('brand','=',$brand)->first();
            if($Product){
                $title = 'DICESA | Editar '.$Product->brand;
                return view('EditProduct',['Product'=>$Product],compact('title'));
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
        }
        elseif (file_exists('images/products/'.$data['brand'].'.png'))
        {
            $product->image = 'images/products/'.$data['brand'].'.png';
        }
        else{
            $product->image = 'images/sample/productSample.png';
        }
        
        $product->inventory = $data['inventory'];
        $product->category = $data['category'];
        $product->save();
        return redirect('product/'.$product->brand);
    }

    public function featureOferta($brand)
    {
        if(Helper::admin()){
            $featured = DB::table('featureds')->where('Menu','=','Ofertas')->first();
            if($featured && $featured->Menu)
            {
                if($featured->Menu == 'Ofertas' && !(str_contains($featured->Productos, $brand))){
                    $feature = Featured::find($featured->id);
                    $feature->Productos .= $brand.',';
                    $feature->save();
                }
            }else{
                $feature = new featured();
                $feature->Menu = 'Ofertas';
                $feature->Productos = $brand.',';
                $feature->save();
            }
            return redirect('product/'.$brand);
        }else{
            return redirect('home');
        }
    }
    public function featureNuevo($brand)
    {
        if(Helper::admin()){
            $featured = DB::table('featureds')->where('Menu','=','Nuevos')->first();
            if($featured && $featured->Menu)
            {
                if($featured->Menu == 'Nuevos' && !(str_contains($featured->Productos, $brand))){
                    $feature = Featured::find($featured->id);
                    $feature->Productos .= $brand.',';
                    $feature->save();
                }
            }else{
                $feature = new featured();
                $feature->Menu = 'Nuevos';
                $feature->Productos = $brand.',';
                $feature->save();
            }
            return redirect('product/'.$brand);
        }else{
            return redirect('home');
        }
    }
    public function featureVendio($brand)
    {
        if(Helper::admin()){
            $featured = DB::table('featureds')->where('Menu','=','Vendidos')->first();
            if($featured && $featured->Menu)
            {
                if($featured->Menu == 'Vendidos' && !(str_contains($featured->Productos, $brand))){
                    $feature = Featured::find($featured->id);
                    $feature->Productos .= $brand.',';
                    $feature->save();
                }
            }else{
                $feature = new featured();
                $feature->Menu = 'Vendidos';
                $feature->Productos = $brand.',';
                $feature->save();
            }
            return redirect('product/'.$brand);
        }else{
            return redirect('home');
        }
    }
    public function featureUnload($brand)
    {
        if(Helper::admin()){
            $featured = DB::table('featureds')->get();
            foreach($featured as $feature){
                if(str_contains($feature->Productos,$brand)){
                    $new = str_replace($brand.',','',$feature->Productos);
                    DB::table('featureds')->where('id', $feature->id)->update(['Productos' => $new]);
                }
            }
            return redirect('product/'.$brand);
        }else{
            return redirect('home');
        }
    }
}
