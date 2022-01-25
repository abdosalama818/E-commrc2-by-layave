<?php

namespace App\Http\Controllers;

use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function show($id){

      $cat= Cat::findOrFail($id);
        return view('web.category',[
            'cat'=>$cat,

        ]);
    }


}
