<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{

    public function show_all_product(){


        $products = Product::all();
          


            return ProductResource::collection($products);
          }



    public function show_product($id){


        $product = Product::find($id);
          if($product == null){
              return response()->json([
                  'msg' => "this id not found"
              ]);
          }


            return new ProductResource($product);
          }







}
