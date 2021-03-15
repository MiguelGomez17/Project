<?php

use App\Http\Controllers\UsersController;

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

/*Route::get('/', function () {
    return view('Home');
});
Route::get('/usuarios', 'UsersController@index');
Route::get('users/register','UsersController@register');
Route::get('users/login','UsersController@login');
Route::post('/CreateUser','UsersController@createUser');
Route::get('/verifyUser/{email}','UsersController@verifyUser');*/

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Users/{id}', 'UsersController@viewUsers')->middleware('auth');
Route::get('/products', 'ProductsController@viewProducts');
Route::get('/product/category/{category}', 'ProductsController@viewCategory');
Route::get('/product/{id}', 'ProductsController@viewProduct');
Route::get('/product/delete/{id}', 'ProductsController@viewDelete');
Route::get('/delete/{id}', 'ProductsController@Delete');
