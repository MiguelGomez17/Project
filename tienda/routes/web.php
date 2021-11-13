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

/* Rutas de pagina principal */
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

/* Rutas de vistas de productos */
Route::get('/product', 'ProductsController@viewProducts');
Route::get('/product/{id}', 'ProductsController@viewProduct');

Route::get('/products/create', 'ProductsController@viewCreate');
Route::post('/create', 'ProductsController@Create');

Route::get('/product/delete/{id}', 'ProductsController@viewDelete');
Route::get('/delete/{id}', 'ProductsController@Delete');

Route::get('/product/category/{category}', 'ProductsController@viewCategory');
Route::get('/search', 'ProductsController@Search');

/* Paginas de importar productos de CSV */
Route::get('/products/import', 'ImportController@viewImport');
Route::post('/import', 'ImportController@Import');
Route::get('/import/done', function(){
    (new product())->importToDb();
    return redirect("/admin");
});

/* Pagina de usuarios */
Route::get('/Users/{id}', 'UsersController@viewUsers')->middleware('auth');

/* Pagina de Carrito de compra */
Route::get('/buy/{id}', 'PedidosController@viewComprar')->middleware('auth');
Route::post('/processbuy/{id}', 'PedidosController@create')->middleware('auth');
Route::get('/entrega/{id}', 'PedidosController@entrega')->middleware('auth');

/* Paginas de administrador */
Route::get('/admin', 'AdminController@viewAdmin')->middleware('auth');
Route::get('/admin/{id}', 'AdminController@upgrade')->middleware('auth');

Route::get('/admin/custom', 'AdminController@viewCustom')->middleware('auth');
Route::post('/admin/loadImages', 'AdminController@loadImages')->middleware('auth');

/* Paginas del footer */
Route::get('/ubicacion', 'HomeController@viewUbicacion');
Route::get('/about', 'HomeController@viewAbout');
