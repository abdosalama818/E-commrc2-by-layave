<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $guarded = ['id','craeted_at','updated_at'];

    //cat has meny products

    public function products(){
        return $this->hasMany(Product::class);
    }
}
