@extends('market.inc.master')
@section('container')
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('market/images/'. config('settings.background_image1') ) }});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
            <h1 class="mb-0 bread">My Cart</h1>
          </div>
        </div>
      </div>
    </div>

    <section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">

						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product name</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>

                                @livewire('update-cart', ['carts'=> $carts])
                                {{-- @livewire('update-cart', ['rowId'=> $Product->rowId,'qty' => $Product->qty,'price' => $Product->price ,'image' => $Product->options->image,'name' => $Product->name]) --}}

						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-end">


    			<div class="col-lg-4 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
    					<p class="d-flex">
    						<span>Subtotal</span>
    						<span>${{Cart::subtotal();}}</span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>${{ config('settings.Delivery') }}</span>
    					</p>
    					<p class="d-flex">
    						<span>Discount</span>
    						<span>{{ config('settings.Discount') }}</span>
    					</p>
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>${{Cart::subtotal() + config('settings.Delivery') - config('settings.Discount')}}</span>
    					</p>
    				</div>
                    @if (Cart::subtotal()>0)

    				<p><a href="{{route('store.order')}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                    @endif
    			</div>
    		</div>
			</div>
		</section>


    @endsection
