<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\mainPage;
use Helper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%221200%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c5ce1ad3f%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c5ce1ad3f%22%3E%3Crect%20width%3D%221200%22%20height%3D%22500%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22500%22%20y%3D%22142.4%22%3E1200x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E
        */
        $defaultImage = 'data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%221200%22%20height%3D%22500%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%201200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_17c5ce1ad3f%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A39pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_17c5ce1ad3f%22%3E%3Crect%20width%3D%221200%22%20height%3D%22500%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%22500%22%20y%3D%22142.4%22%3E1200x500%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E';
        $bannerImages = mainPage::all();
        //$productsOferta = DB::table('products')->where('inventory','>',0)->where('brand','LIKE','TBL%')->orderBy('price', 'asc')->simplePaginate(6, ['*'], 'Ofertas');
        //$productsNuevo = DB::table('products')->where('inventory','>',0)->where('brand','LIKE','ADG%')->orderBy('price', 'desc')->simplePaginate(6, ['*'], 'Nuevos');
        //$productsVendidos = DB::table('products')->where('inventory','>',0)->where('brand','LIKE','ACB%')->orderBy('price','desc')->simplePaginate(6, ['*'], 'Vendidos');
        
        $productsOfertas = DB::table('featureds')->where('Menu','=','Ofertas')->get();
        $productsVendidos = DB::table('featureds')->where('Menu','=','Vendidos')->get();
        $productsNuevos = DB::table('featureds')->where('Menu','=','Nuevos')->get();
        $Ofertas = explode(',',$productsOfertas[0]->Productos);
        $Vendidos = explode(',',$productsVendidos[0]->Productos);
        $Nuevos = explode(',',$productsNuevos[0]->Productos);
        return view('Home', ['productsOferta' => $Ofertas,
                                'productsNuevo' => $Nuevos,
                                'productsVendidos' => $Vendidos,
                                'bannerImages' => $bannerImages,
                                'defaultImage' => $defaultImage]);
    }

    public function viewUbicacion()
    {
        return view('Ubicacion');
    }
    public function viewAbout()
    {
        return view('About');
    }
}
