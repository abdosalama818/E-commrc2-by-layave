<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
 public function show_product($id){
     $product = Product::findOrFail($id);
     return view('web.product',[
         'product' => $product
     ]);

 }



}
