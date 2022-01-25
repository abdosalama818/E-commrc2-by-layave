<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id','craeted_at','updated_at'];

    //relationship between order and product M:M

    public function product(){
        return $this->belongsToMany(Product::class);
    }

}
