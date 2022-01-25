@extends('layout')


@section('body')




	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/shop_background.jpg') }}"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">{{ $cat->name }}</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">

					<!-- Shop Sidebar -->
					<div class="shop_sidebar">
						<div class="sidebar_section">
							<div class="sidebar_title">Categories</div>
							<ul class="sidebar_categories">
								<li><a href="#">Computers & Laptops</a></li>
								<li><a href="#">Cameras & Photos</a></li>
								<li><a href="#">Hardware</a></li>
								<li><a href="#">Smartphones & Tablets</a></li>
								<li><a href="#">TV & Audio</a></li>
								<li><a href="#">Gadgets</a></li>
								<li><a href="#">Car Electronics</a></li>
								<li><a href="#">Video Games & Consoles</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>
						</div>

					</div>

				</div>

				<div class="col-lg-9">

					<!-- Shop Content -->

					<div class="shop_content">

						<div class="product_grid">
							<div class="product_grid_border"></div>

							<!-- Product Item -->
                            @foreach ($cat->products as $product )
                            <div class="product_item">
								<div class="product_border"></div>
								<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="{{ asset("uploads/$product->img")}}" alt=""></div>
								<div class="product_content">
									<div class="product_price">${{ $product->price }}</div>
									<div class="product_name"><div><a href="{{ url("product/$product->id") }}" tabindex="0">{{ $product->name }}</a></div></div>
								</div>
							{{-- 	<divclass="product_fav"><iclass="fasfa-cart-plus"></i></div> --}}
							</div>
                            @endforeach




						</div>



					</div>

				</div>
			</div>
		</div>
	</div>






@endsection


