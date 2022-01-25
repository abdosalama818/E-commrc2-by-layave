<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->string('name',255);
            $table->integer('price');
            $table->integer('subtotal');

            $table->string('img',255);
            $table->smallInteger('qty');
            $table->unsignedBigInteger('user_id')->nullable();// ! ! ! THIS STRING ! ! !
              $table->foreign('user_id')->references('id')->on('users');



              $table->unsignedBigInteger('product_id');// ! ! ! THIS STRING ! ! !
              $table->foreign('product_id')->references('id')->on('products');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
