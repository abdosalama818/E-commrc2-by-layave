<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use App\Http\Resources\ProductResource;
use App\Models\Cat;
use App\Models\Product;

class ApiCatController extends Controller
{

    public function show_category($id){


      $cat = Cat::find($id);
        if($cat == null){
            return response()->json([
                'msg' => "this id not found"
            ]);
        }


          return new CatResource($cat);
        }


    }

