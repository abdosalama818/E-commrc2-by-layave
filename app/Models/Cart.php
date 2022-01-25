<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $guarded = ['id','craeted_at','updated_at'];


  //cart has meny products

  public function products(){
    return $this->hasMany(Product::class);
}


//cart belongs to one user
public function user(){
    return $this->belongsTo(User::class);
}


}
