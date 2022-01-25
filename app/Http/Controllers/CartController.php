<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Cart2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


session_start();
class CartController extends Controller
{



    public function show(){


          return view('web.cart',[


          ]);
      }

      public function addCart(Request $request){
          $items = Cart::create([


              'product_id'=>$request->id,
              'user_id'=>$request->id,
              'name'=>$request->name,
              'price'=>$request->price,
              'qty'=>$request->qty,
              'subtotal'=>$request->price * $request->qty,
              'img'=>$request->img
          ]);

          return redirect(url('cart'));
      }


}
