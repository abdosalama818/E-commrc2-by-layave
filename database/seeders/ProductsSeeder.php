<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'huwaei',
            'price' =>2000,
            'desc' => "this is dumy data",
            'img'=>'1.jpg',
            'pieces_No'=>'1',
            'cat_id' => 2
        ]);


        Product::create([
            'name' => 'samsung',
            'price' =>3000,
            'desc' => "this is dumy data",
            'img'=>'2.jpg',
            'pieces_No'=>'1',
            'cat_id' => 2
        ]);



        Product::create([
            'name' => 'computer',
            'price' =>2000,
            'desc' => "this is dumy data",
            'img'=>'3.jpg',
            'pieces_No'=>'1',
            'cat_id' => 1
        ]);




        Product::create([
            'name' => 'computer',
            'price' =>2000,
            'desc' => "this is dumy data",
            'img'=>'4.jpg',
            'pieces_No'=>'1',
            'cat_id' => 1
        ]);




        Product::create([
            'name' => 'dell',
            'price' =>2000,
            'desc' => "this is dumy data",
            'img'=>'6.jpg',
            'pieces_No'=>'1',
            'cat_id' => 3
        ]);


        Product::create([
            'name' => 'hp',
            'price' =>4000,
            'desc' => "this is dumy data",
            'img'=>'5.jpg',
            'pieces_No'=>'1',
            'cat_id' => 3
        ]);
    }
}
