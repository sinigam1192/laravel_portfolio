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

// Route::get("/users", function() {
// 	return view("users/index");  // (1)
// });
//ルーティングは以下の通り。railsとの違いは、controllerで取得した変数の渡し方が明記的になっている。
//bladeテンプレートはcontrollerの戻り値で呼び出している。
Route::get('/users', 'UsersController@index');

Auth::routes();//rogin

Route::get('/home', 'HomeController@index')->name('home');
