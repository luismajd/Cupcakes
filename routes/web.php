<?php


use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('pedido', 'PedidoController')->middleware('verified');

Route::get('postre/create', 'PostreController@create')->name('postre.create');

Route::get('postre/hidden', 'PostreController@hidden')->name('postre.hidden');

Route::get('postre/{id}', 'PostreController@unhide')->name('postre.unhide');

Route::resource('postre', 'PostreController');

Route::resource('user', 'UserController');

Route::post('archivo/{archivo}', 'ArchivoController@delete')->name('archivo.delete');;

Route::resource('archivo', 'ArchivoController');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
