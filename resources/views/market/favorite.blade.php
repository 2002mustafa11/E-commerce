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


						      </tr>
						    </thead>
                            <tbody>
                                @foreach ($products as $Product)

                                {{-- @dd($Product) --}}
                                <tr class="text-center">
                                    <td class="product-remove">
                                        <a href="{{route('favorite.destroy',['product_id' => $Product->id])}}"><span class="ion-ios-close"></span></a>

                                    </td>
                                    <td class="image-prod"><div class="img" style="background-image:url({{asset('market/images/product/'.$Product->image)}});"></div></td>

                                    <td class="product-name">
                                        {{-- @dd($Product->Product->name) --}}
                                        <h3>{{($Product->name)}}</h3>
                                    </td>

                                    <td class="price">${{$Product->discount_price}}</td>
                                </tr><!-- END TR-->
                                @endforeach
						    </tbody>
						  </table>
					  </div>
    			</div>
    		</div>

			</div>
		</section>


    @endsection
