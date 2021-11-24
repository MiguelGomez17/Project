<?php

use App\Http\Controllers\UsersController;
use App\product;

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

Auth::routes();

/*
//  Partes para todos los usuarios
*/
/* Rutas de pagina principal */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/* Rutas de vistas de productos */
Route::get('/product', 'ProductsController@viewProducts');
Route::get('/product/{id}', 'ProductsController@viewProduct');

Route::get('/product/category/{category}', 'ProductsController@viewCategory');
Route::get('/search', 'ProductsController@Search');

/* Pagina de usuarios */
Route::get('/Users/{id}', 'UsersController@viewUsers')->middleware('auth');

/* Pagina de Carrito de compra */
Route::any('/processAdd/{id}', 'PedidosController@agregar')->middleware('auth');

/* Paginas del footer */
Route::get('/ubicacion', 'HomeController@viewUbicacion');
Route::get('/about', 'HomeController@viewAbout');

/*
//  Partes solo para administradores
*/

/* Paginas de administrador */
Route::get('/admin', 'AdminController@viewAdmin')->middleware('auth');
Route::get('/admin/{id}', 'AdminController@upgrade')->middleware('auth');
//Importar imagenes para pagina principal
Route::get('/custom', 'AdminController@viewCustom')->middleware('auth');
Route::any('/loadImages', 'AdminController@loadImages')->middleware('auth');

/* Paginas de importar productos de CSV */
Route::get('/products/import', 'ImportController@viewImport')->middleware('auth');
Route::any('/import', 'ImportController@Import')->middleware('auth');
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