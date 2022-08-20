<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\MahsulotController;
use App\Models\Mahsulot;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/mahsulot', function (){
//    return Mahsulot::all();
//});

Route::get('mahsulots','MahsulotController@mahsulot')->name('getAll');

Route::post('mahsulots','MahsulotController@add')->name('add');

Route::get('mahsulot/{id}','MahsulotController@get')->name('get');

Route::get('mahsulot/delete/{id}','MahsulotController@delete')->name('delete');

Route::post('mahsulots/{id}','MahsulotController@edit')->name('edit');
