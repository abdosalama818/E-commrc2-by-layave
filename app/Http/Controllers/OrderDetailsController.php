<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderDetailsResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class OrderDetailsController extends Controller
{
    public function add_order_details( Request $request,$id){





        $validator = Validator::make($request->all(),[



            'product_id' => 'required|numeric',
            'qty' => 'required|numeric',

        ]);
        if($validator->fails()){
            return response()->json([
                'errors'=>$validator->errors()
            ]);
        }

$order = Order::find($id);

if($order == null){
    return response()->json([
        'msg' => "this id not found"
    ]);
}
        $order_details = OrderDetails::create([

            'order_id'=>$id,
            'product_id'=>$request->product_id,
            'qty'=>$request->qty,

        ]);
        return response()->json([
            'msg' => 'order added successfully',
            'order_details' => new OrderDetailsResource($order_details)
        ]);

    }

    public function show_all_orders(){
        $orders = OrderDetails::all();
        return OrderDetailsResource::collection($orders);
    }
















}
