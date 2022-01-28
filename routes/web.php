<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CatController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController;
use App\Models\Cat;
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
/*
Route::get('/', function () {
    return view('web.index');
});*/


Route::get('/',[Controller::class,'index']);
Route::get('/cat/{id}',[CatController::class,'show']);
Route::get('product/{id}',[ProductController::class,'show_product']);
Route::post('/add_cart ',[CartController::class,'addCart']);
Route::get('/cart',[CartController::class,'show']);

Route::get('/remove/cart/{id}',[CartController::class,'remove_item']);





Route::get('test',[CatController::class,'test_show']);

Route::post('/test/store',[CatController::class,'test']);



