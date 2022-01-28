<?php

use App\Http\Controllers\Api\ApiCatController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsController;
use App\Models\OrderDetails;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
    Route::get('/cat2', [AuthController::class,'all']);




});



Route::group(['middleware' => 'jwt.auth'], function () {

Route::get('/cat/show/{id}', [ApiCatController::class,'show_category']);

Route::get('/product/show', [ProductController::class,'show_all_product']);
Route::get('/product/show/{id}', [ProductController::class,'show_product']);

Route::post('/cart/create/{id}', [CartController::class,'add_to_cart']);
Route::get('/cart/delete/{id}', [CartController::class,'add_to_cart']);
Route::get('/cart/delete/{id}', [CartController::class,'delete_cart']);
Route::get('/cart/show/', [CartController::class,'show_all_item_form_cart']);
Route::get('/cart/count/', [CartController::class,'get_count_item_in_cart']);

Route::post('/order', [OrderController::class,'add_order']);
Route::post('/order/details/{id}', [OrderDetailsController::class,'add_order_details']);
Route::get('/orders/show', [OrderDetailsController::class,'show_all_orders']);







});




