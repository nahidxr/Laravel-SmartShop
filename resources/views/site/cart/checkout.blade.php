@extends('site.layouts.app')

@section('content')
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>
<!-- //banner -->
<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<thead>
					<tr>
						<th>Remove</th>
						<th>Product</th>
						<th>Quantity</th>
						<th>Product Name</th>
						<th>Product Size</th>
						<th>Product Colour</th>
						<th>Price Per Unit</th>
						<th>Total Price</th>
					</tr>
				</thead>
                @foreach ($cartCollection as $cart)   
					<tr class="rem1">
						<td class="invert-closeb">
                            <a href="{{ url("/cart/remove/$cart->id") }}">
                                <div class="rem">
                                    <div class="close1"> </div>
                                </div>
                            </a>
							
							{{-- <script>$(document).ready(function(c) {
								$('.close1').on('click', function(c){
									$('.rem1').fadeOut('slow', function(c){
										$('.rem1').remove();
									});
									});	  
								});
						   </script> --}}
						</td>
						<td class="invert-image"><a href="single.html"><img style="width: 120px; height:100px" src="{{ asset("/storage/".$cart->attributes->featured_image) }}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<a href="{{ url("/cart/cart_remove_one_product/$cart->id") }}">
                                        <div class="entry value-minus">&nbsp;</div>
                                    </a>
									<div class="entry value"><span>{{ $cart->quantity }}</span></div>
                                    <a href="{{ url("/cart/cart_add_one_product/$cart->id") }}">
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </a>
									
								</div>
							</div>
						</td>
						<td class="invert">{{ $cart->name }}</td>
						<td class="invert">{{ $cart->attributes->size }}</td>
						<td class="invert">{{ $cart->attributes->colour }}</td>
						<td class="invert">{{ $cart->price }}</td>
						<td class="invert">{{ $cart->price *$cart->quantity }}</td>
					</tr>
                 @endforeach
					
					
								<!--quantity-->
									{{-- <script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script> --}}
								<!--quantity-->
			</table>
		</div>
		<div class="checkout-left">	
				
				<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
					<a href="mens.html"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Back To Shopping</a>
				</div>
				<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
					<h4>Shopping basket</h4>
					<ul>
						@php
							$total=0;
						@endphp
						@foreach ($cartCollection as $cart)  
						<li>{{ $cart->name }} <i>-</i> <span>{{ $cart->price *$cart->quantity }}</span></li>
						@php
							$total+=$cart->price *$cart->quantity;
						@endphp
						@endforeach
						<hr>
						<li>Total <i>-</i> <span>{{ $total }}</span></li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
	</div>
</div>	
<!-- //check out -->
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