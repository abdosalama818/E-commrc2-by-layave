<?php

use App\Http\Controllers\Api\dashboard\AdminDashboard;
use Illuminate\Support\Facades\Route;

Route::prefix('dashboard')->name("dashboard.")->middleware(['jwt.auth'])->group(function(){
    Route::get('/products',[AdminDashboard::class,'get_all_product']);
    Route::get('/product/{id}',[AdminDashboard::class,'get_product_by_id']);
    Route::post('/product/updated/{id}',[AdminDashboard::class,'edit_product']);
    Route::get('/product/delete/{id}',[AdminDashboard::class,'delete_product']);



    Route::get('/cats',[AdminDashboard::class,'show_all_category']);
    Route::get('/cat/show/{id}',[AdminDashboard::class,'show_category']);
    Route::post('/cat/updated/{id}',[AdminDashboard::class,'edit_cat']);
    Route::get('/cat/delete/{id}',[AdminDashboard::class,'delete_category']);




});
