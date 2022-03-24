@extends('site.layouts.app')

@section('content')


<!-- header -->
<div class="header">
	<div class="container">
		<ul>
			<li><span class="glyphicon glyphicon-time" aria-hidden="true"></span>Free and Fast Delivery</li>
			<li><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Free shipping On all orders</li>
			<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span><a href="mailto:info@example.com">info@example.com</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="container">
		<div class="col-md-3 header-left">
			<h1><a href="index.html"><img src="{{ asset('/site/images/logo3.jpg') }}"></a></h1>
		</div>
		<div class="col-md-6 header-middle">
			<form>
				<div class="search">
					<input type="search" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
				</div>
				<div class="section_room">
					<select id="country" onchange="change_country(this.value)" class="frm-field required">
						 <option value="null">All categories</option>
						<option value="null">Electronics</option>     
						<option value="AX">kids Wear</option>
						<option value="AX">Men's Wear</option>
						<option value="AX">Women's Wear</option>
						<option value="AX">Watches</option> 
					</select> 
				</div>
				<div class="sear-sub">
					<input type="submit" value=" ">
				</div>
				<div class="clearfix"></div>
			</form>
		</div>
		<div class="col-md-3 header-right footer-bottom">
			<ul>

				@if(Auth::check())
				{{ Auth::user()->name }}
				<form action="{{ url('/logout') }}" method="POST">
					@csrf
				  <button type="submit" class="nav-link">
					<i class="fas fa-sign-out-alt">Log-Out</i>
				  </button>
				</form>
				@else
				<a class="btn btn-success" href="{{ url('/login') }}"><i class="fa fa-sign-in" aria-hidden="true">Log-In</i></a>
				@endif
				{{-- <li><a href="#" class="use1" data-toggle="modal" data-target="#myModal4"><span>Login</span></a>
					
				</li>
				<li><a class="fb" href="#"></a></li>
				<li><a class="twi" href="#"></a></li>
				<li><a class="insta" href="#"></a></li>
				<li><a class="you" href="#"></a></li> --}}
			</ul>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class="active menu__item menu__item--current"><a class="menu__link" href="index.html">Home <span class="sr-only"></span></a></li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> men's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="{{ asset('/site/images/woo1.jpg') }}" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											@foreach ($category_list as $item)
											@if ($item->main_category_id==0)
											<li><a href="mens.html">{{ $item->name }}</a></li>
											@endif
											@endforeach
											
											
										</ul>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">women's wear <span class="caret"></span></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
											@foreach ($category_list as $item)
											@if ($item->main_category_id==1)
											<li><a href="mens.html">{{ $item->name }}</a></li>
											@endif
											@endforeach
										</ul>
									</div>
									<div class="col-sm-6 multi-gd-img multi-gd-text ">
										<a href="womens.html"><img src="{{ asset('/site/images/woo.jpg') }}" alt=" "/></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</ul>
					</li>
					<li class=" menu__item"><a class="menu__link" href="{{ url('/electronics') }}">Electronics</a></li>
					<li class=" menu__item"><a class="menu__link" href="codes.html">Short Codes</a></li>
					<li class=" menu__item"><a class="menu__link" href="contact.html">contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>	
		</div>
		<div class="top_nav_right">
			<div class="cart box_1">
						<a href="checkout.html">
							<h3> <div class="total">
								<i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Empty Cart</a></p>
						
			</div>	
		</div>
		<div class="clearfix"></div>
	</div>
</div>




<div class="page-head">
	<div class="container">
		<h3>Electronics</h3>
	</div>
</div>

<!-- //banner -->
<!-- Electronics -->
<div class="electronics">
	<div class="container">
		<div class="col-md-8 electro-left text-center">
			<div class="electro-img-left mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img src="{{ asset('site/images/watch.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Branded Watches</h4>
								<span class="separator"></span>
								<p><span class="item_price">$500</span></p>
								<span class="separator"></span>
								<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
							</div>
						</div>
				</div>
			</div>
			<div class="electro-img-btm-left mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img src="{{ asset('site/images/e1.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Mobiles</h4>
								<span class="separator"></span>
								<p><span class="item_price">$500</span></p>
								<span class="separator"></span>
								<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
							</div>
						</div>
				</div>
			</div>
			<div class="electro-img-btm-right mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img src="{{ asset('site/images/e2.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Branded Watches</h4>
								<span class="separator"></span>
								<p><span class="item_price">$500</span></p>
								<span class="separator"></span>
								<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
							</div>
						</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="col-md-4 electro-right text-center">
			<div class="electro-img-rt mask">
				<div class="content-grid-effect slow-zoom vertical">
					<div class="img-box"><img src="{{ asset('site/images/e4.jpg') }}" alt="image" class="img-responsive zoom-img"></div>
						<div class="info-box">
							<div class="info-content electro-text simpleCart_shelfItem">
								<h4>Mobiles</h4>
								<span class="separator"></span>
								<p><span class="item_price">$500</span></p>
								<span class="separator"></span>
								<a class="item_add hvr-outline-out button2" href="#">add to cart </a>
							</div>
						</div>
				</div>
			</div>
		</div>


		<div class="clearfix"></div>
			<div class="ele-bottom-grid">
				<h3><span>Latest </span>Collections</h3>
				@foreach ($product_list as $product)
				@if ($product->category->main_category_id==2)
				<div class="col-md-3 product-men">
					<div class="men-pro-item simpleCart_shelfItem">
						<div class="men-thumb-item" style="height:230px;">
							<img src="{{ asset("storage/$product->featured_image") }}" alt="" class="pro-image-front">
							<img src="{{ asset("storage/$product->featured_image") }}" alt="" class="pro-image-back">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="{{ url("/item/$product->id") }}" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								{{-- <span class="product-new-top">New</span> --}}
								
						</div>
						<form action="{{ url("/add_product/$product->id") }}" method="POST">
							@csrf
								<div class="item-info-product ">
									<h4><a href="{{ url("/item/$product->id") }}">{{ $product->name }}</a></h4>
									<div class="info-product-price">
										<span class="item_price">{{ $product->price_after_discount }}</span>
										@if ($product->discount_amount>0)
										<del>{{ $product->price }}</del>
										@endif
									</div>
									<div class="occasion-cart">
										<button type="submit" class="btn btn-warning">Add to Cart</button>
									</div>										
								</div>
						</form>
					</div>
				</div>
				@endif
				@endforeach
				
					
					
						<div class="clearfix"></div>
			</div>
	</div>
</div>
<!-- //Electronics -->
<!-- //product-nav -->
<div class="coupons">
	<div class="container">
		<div class="coupons-grids text-center">
			<div class="col-md-3 coupons-gd">
				<h3>Buy your product in a simple way</h3>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				<h4>LOGIN TO YOUR ACCOUNT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
				<h4>SELECT YOUR ITEM</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="col-md-3 coupons-gd">
				<span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>
				<h4>MAKE PAYMENT</h4>
				<p>Neque porro quisquam est, qui dolorem ipsum quia dolor
			sit amet, consectetur.</p>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
@endsection