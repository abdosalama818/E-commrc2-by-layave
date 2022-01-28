@extends('layout')

@section('body')
<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <!-- <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <li data-image="images/single_4.jpg"><img src="{{asset('images/single_4.jpg')}}" alt=""></li>
                    <li data-image="images/single_2.jpg"><img src="{{asset('images/single_2.jpg')}}" alt=""></li>
                    <li data-image="images/single_3.jpg"><img src="{{asset('images/single_3.jpg')}}" alt=""></li>
                </ul>
            </div> -->

            <!-- Selected Image -->
            <div class="col-lg-6 order-lg-2 order-1">
                <div class="image_selected"><img src="{{asset("uploads/$product->img")}}" alt=""></div>
            </div>

            <!-- Description -->
            <div class="col-lg-6 order-3">
                <div class="product_description">
                    <div class="product_category">{{ $product->cat->name }}</div>
                    <div class="product_name">{{ $product->name }}</div>
                    <div class="product_text"><p>{{ $product->desc }}</p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="" method = "POST" >
                            @csrf
                            <div class="clearfix" style="z-index: 1000;">

                                <input type="hidden" name="name" value="{{ $product->name }}">
                                <input type="hidden" name="img" value="{{ $product->img }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                             

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" name="qty" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <div class="product_price">${{ $product->price }}</div>

                            </div>

                            <div class="button_container">
                                <button type="submit" name="submit" class="button cart_button">Add to Cart</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
