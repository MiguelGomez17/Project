<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $productsOferta = DB::table('products')->orderBy('price', 'desc')->paginate(3, ['*'], 'Ofertas');
        $productsNuevo = DB::table('products')->orderBy('name', 'asc')->paginate(3, ['*'], 'Nuevos');
        $productsVendidos = DB::table('products')->paginate(3, ['*'], 'Vendidos');
        return view('home', ['productsOferta' => $productsOferta,
                                'productsNuevo' => $productsNuevo,
                                'productsVendidos' => $productsVendidos]);
    }
}
