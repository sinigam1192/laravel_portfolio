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
//laravelの初期ページ
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();//rogin


//ルーティングは以下の通り。railsとの違いは、controllerで取得した変数の渡し方が明記的になっている。
//bladeテンプレートはcontrollerの戻り値で呼び出している。
Route::get('/users', 'UsersController@index');
Route::get('/home', 'HomeController@index')->name('home');

//location_routes
//new, list, show, edit ::get
//store, update, destroy ::post,put,putch
Route::get('/users/locations/new', 'LocationsController@new');
Route::get('/users/locations/list', 'LocationsController@list');
Route::post('/users/locations/create', 'LocationsController@create');
Route::resource('users/locations', 'LocationsController',['only' => ['show', 'edit', 'store', 'update', 'destroy']]);
