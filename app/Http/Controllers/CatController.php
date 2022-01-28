<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CatController extends Controller
{
    public function show($id){

      $cat= Cat::findOrFail($id);
        return view('web.category',[
            'cat'=>$cat,

        ]);
    }

    public function test_show(){
        return view('test');
    }

    public function test(Request $request){
       $imgpath = Storage::putFile('cats',$request->img);
        Test::create([
            'name'=>$request->name,
            'img'=>$imgpath,
        ]);

    }

}
