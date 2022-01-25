<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    ///product belongs to one cat
    protected $guarded = ['id','craeted_at','updated_at'];

    public function cat(){
        return $this->belongsTo(Cat::class);
    }

// products belongs to one cart
    public function cart(){
        return $this->belongsTo(Cart::class);
    }


        //relationship between order and product M:M

        public function order(){
            return $this->belongsToMany(Order::class);
        }
}
