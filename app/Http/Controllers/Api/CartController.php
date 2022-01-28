<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function add_to_cart($id , Request $request){

        $product = Product::find($id);
        if($product == null){
            return response()->json([
                'msg'=> "this item not found"
            ]);
        }
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'img' => 'required|image|mimes:png,jpg',
            'qty' => 'required|numeric|max:20',

        ]);

        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }

       $img_path =  Storage::putFile('cart',$request->img);
        $item_in_cart = Cart::create([
            'product_id' => $id,
            'name'=>$request->name,
            'price'=>$request->price,
            'img'=>$img_path,
            'qty'=>$request->qty,
            'subtotal'=> $request->price * $request->qty,
            'user_id'=>Auth::id()
        ]);
        return response()->json([
            'msg' => 'item added to cart successfully',
            'cart_item' => new CartResource($item_in_cart)
        ]);

    }


public function delete_cart($id){
    $item = Cart::find($id);
    if($item == null){
        return response()->json([
            'msg'=>"this item not found in dataBase"
        ]);

    }
    Storage::delete($item->img);
    $item->delete();

    return response()->json([
        'msg' => 'item deleted successfully'
    ]);
}


public function show_all_item_form_cart(){
    $item = Cart::all();
    return CartResource::collection($item);
}
// this function used to get count product in cart to use in العداد
public function get_count_item_in_cart(){
    $count = Cart::count();
    return response()->json([
        'count'=>$count
    ]);
}


}
