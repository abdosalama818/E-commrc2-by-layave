<?php

namespace App\Http\Controllers\Api\dashboard;

use App\Models\Cat;
use App\Models\Product;
use Illuminate\Http\Request;
use GuzzleHttp\Handler\Proxy;
use App\Http\Resources\CatResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ProductController;

class AdminDashboard extends Controller
{
    public function get_all_product(){
        $products = Product::all();
        return ProductResource::collection($products);

    }






    public function get_product_by_id($id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                'msg'=>"check your id it not found in data base"
            ]);
        }
        return new ProductResource($product);

    }


    public function edit_product($id , Request $request){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                'msg'=>"check your id it not found in data base"
            ]);
        }

        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'desc' => 'required|string|min:10',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:png,jpg',
            'pieces_No' => 'required|numeric|max:20',
            'cat_id' => 'required|numeric',


        ]);
        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }

       $img_path=$product->img;
       if($request->hasFile('img')){
           Storage::delete($img_path);
           $img_path= Storage::putFile('dashbord_image',$request->img);
       }

        $product->update([
            'name' => $request->name,
            'price' =>$request->price,
            'desc' => $request->desc,
            'img'=> $img_path,
            'pieces_No'=>$request->pieces_No,
            'cat_id' => $request->cat_id
        ]);
        return response()->json([
            'msg'=>"your product is updated",
            'product'=>new ProductResource($product)

        ]);

    }





    public function delete_product($id){
        $product = Product::find($id);
        if($product == null){
            return response()->json([
                'msg'=>"check your id it not found in data base"
            ]);
        }

        Storage::delete($product->img);
        $product->delete();

        return response()->json([
            'msg' => 'item deleted successfully'
        ]);

    }


    /***
     *
     * this section belongs to add category from admin
     */
    public function show_all_category(){

        $cats = Cat::all();
        return CatResource::collection($cats);
    }

    public function show_category($id){


        $cat = Cat::find($id);
          if($cat == null){
              return response()->json([
                  'msg' => "this id not found"
              ]);
          }


            return new CatResource($cat);
          }




          public function edit_cat($id , Request $request){
            $cat = cat::find($id);
            if($cat == null){
                return response()->json([
                    'msg'=>"check your id it not found in data base"
                ]);
            }

            $validator = Validator::make($request->all(),[
                'name' => 'required|string|max:255',



            ]);
            if($validator->fails()){
                return response()->json([
                    'errors'=>$validator->errors()
                ]);
            }

           $img_path=$cat->img;
           if($request->hasFile('img')){
               Storage::delete($img_path);
               $img_path= Storage::putFile('dashbord_image',$request->img);
           }

            $cat->update([
                'name' => $request->name,

            ]);
            return response()->json([
                'msg'=>"your product is updated",
                'product'=>new ProductResource($cat)

            ]);

        }


        public function delete_category($id){
            $cat = cat::find($id);
            if($cat == null){
                return response()->json([
                    'msg'=>"check your id it not found in data base"
                ]);
            }

            Storage::delete($cat->img);
            $cat->delete();

            return response()->json([
                'msg' => 'item deleted successfully'
            ]);

        }

}
