<?php

use App\Http\Controllers\UsersController;
use App\product;
use App\Pedido;
use App\categories;
use App\Mail\Verificacion;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Auth::routes(['verify' => true]);

/*
//  Partes para todos los usuarios
*/
/* Rutas de pagina principal */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index')->name('home');
Route::get('Home', 'HomeController@index')->name('home');
Route::get('/Home', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/* Rutas de vistas de productos */
Route::get('/product', 'ProductsController@viewProducts');
Route::get('/product/{brand}', 'ProductsController@viewProduct');

Route::get('/product/category/{category}', 'categoryController@viewCategory');
Route::get('/category/{category}', 'categoryController@viewCategory');
Route::get('/search', 'ProductsController@Search');

/* Pagina de usuarios */
Route::get('/Users/{id}', 'UsersController@viewUsers')/*->middleware('auth')*/;
Route::get('/Verify', 'UsersController@viewVerify');

/* Pagina de Carrito de compra */
Route::any('/processAdd/{id}', 'PedidosController@agregar')/*->middleware('auth')*/;
Route::any('/Remove/{id}', 'PedidosController@remover')/*->middleware('auth')*/;

/* Paginas del footer */
Route::get('/ubicacion', 'HomeController@viewUbicacion');
Route::get('/about', 'HomeController@viewAbout');

/*
//  Partes solo para administradores
*/



/* Paginas de administrador */
Route::get('/admin', 'AdminController@viewAdmin')/*->middleware('auth')*/;
Route::get('/admin/{id}', 'AdminController@upgrade')/*->middleware('auth')*/;
//Importar imagenes para pagina principal
Route::get('/custom', 'AdminController@viewCustom')/*->middleware('auth')*/;
Route::get('/custom/delete/{id}', 'AdminController@customDelete')/*->middleware('auth')*/;
Route::any('/loadImages', 'AdminController@loadImages')/*->middleware('auth')*/;

/* Paginas de importar lista de categorias de CSV */
Route::get('/categories/import', 'ImportController@viewCatImport')/*->middleware('auth')*/;
Route::get('/categories/image/{categoria}', 'categoryController@viewCatImage')/*->middleware('auth')*/;
Route::any('/catEdit/{id}', 'categoryController@catEdit');
Route::any('/catImport', 'ImportController@catImport')/*->middleware('auth')*/;
Route::get('/catImport/done', function(){
    set_time_limit(7200);
    (new categories())->importToDb();
    return redirect("/admin");
});

/* Paginas de importar productos de CSV */
Route::get('/products/import', 'ImportController@viewImport')/*->middleware('auth')*/;
Route::any('/import', 'ImportController@Import')/*->middleware('auth')*/;
Route::get('/import/done', function(){
    set_time_limit(7200);
    (new product())->importToDb();
    return redirect("/admin");
});


/* Paginas de creacion de productos */
Route::get('/products/create', 'ProductsController@viewCreate');
Route::get('/product/edit/{id}', 'ProductsController@viewEdit');
Route::any('/edit/{id}', 'ProductsController@Edit');
Route::any('/create', 'ProductsController@Create');

Route::get('/product/delete/{id}', 'ProductsController@viewDelete');
Route::get('/delete/{id}', 'ProductsController@Delete');

Route::get('/mail', function(){
    $codigo = rand(1000, 9999);
    $correo = new Verificacion;
    Mail::to('miguel.gomez.rent@gmail.com')->send($correo);
    return($codigo);
});

//Auth::routes();
Route::prefix('Gn2RM01hdT10CbhasDL/')->group(function(){
    Auth::routes();
});