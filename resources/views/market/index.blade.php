@extends('market.inc.master')
@section('container')



    <section id="home-section" class="hero">
		  <div class="home-slider owl-carousel">
	      <div class="slider-item" style="background-image: url({{ asset('market/images/'. config('settings.background_image1') ) }})">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-md-12 ftco-animate text-center">
	              <h1 class="mb-2">We serve Fresh Vegestables &amp; Fruits</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#2" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>

	      <div class="slider-item" style="background-image:  url({{ asset('market/images/'. config('settings.background_image2') ) }}  ) ">
	      	<div class="overlay"></div>
	        <div class="container">
	          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

	            <div class="col-sm-12 ftco-animate text-center">
	              <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
	              <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
	              <p><a href="#1" class="btn btn-primary">View Details</a></p>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
    </section>

    <section class="ftco-section">
			<div class="container">
				<div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Free Shipping</h3>
                <span>On order over $100</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Always Fresh</h3>
                <span>Product well package</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Superior Quality</h3>
                <span>Quality Products</span>
              </div>
            </div>
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
            		<span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>24/7 Support</span>
              </div>
            </div>
          </div>
        </div>
			</div>
		</section>

		<section class="ftco-section ftco-category ftco-no-pt">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<div class="row">
						<div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url({{ asset('market/images/category.jpg') }})">
                         {{--  --}}
                            <div class="text text-center">
                                <h2>Vegetables</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="{{url('/shop')}}" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                        </div>
							<div class="col-md-6">

                                @foreach ($categories as $key => $category)
                                {{-- {{$key}} --}}
								<div class="{{($key == 3 || $key == 4)?'category-wrap ftco-animate img d-flex align-items-end':'category-wrap ftco-animate img mb-4 d-flex align-items-end'}}" style="background-image: url({{ asset('market/images/category/'.$category->image) }})">
									<div class="text px-3 py-1">
                                        <h2 class="mb-0"><a href="{{ route('shop',['category_id'=>$category->id]) }}">{{$category->name}}</a></h2>
									</div>
								</div>
                                @endforeach
							</div>
						</div>
					</div>
                    <div class="mb-4"></div>
					<div class="col-md-4">
						@foreach ($categories1 as $key => $category)
								<div class="{{($key == 2 || $key == 3)?'category-wrap ftco-animate img d-flex align-items-end':'category-wrap ftco-animate img mb-4 d-flex align-items-end'}}" style="background-image: url({{ asset('market/images/category/'.$category->image) }})">
									<div class="text px-3 py-1">
                                        <h2 class="mb-0"><a href="{{ route('shop',['category_id'=>$category->id]) }}">{{$category->name}}</a></h2>
									</div>
								</div>
                        @endforeach
					</div>

				</div>
			</div>
		</section>

    <section class="ftco-section" id="1">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Latest offers</span>
            <h2 class="mb-4">Our offer</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    	</div>
        <div class="container">
            <div class="row">

            @foreach ( $products_offer as $product )

            <div class="col-md-6 col-lg-3 ftco-animate">

                    <div class="product">
                        <a href="{{route('show', encrypt($product->id))}}" class="img-prod">
                            <img class="img-fluid" src="{{asset('market/images/product/'.$product->image)}}" alt="Colorlib Template">

                            <span class="status">{{ round(100 - ($product->discount_price / $product->regular_price * 100)) }}%</span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{route('show', encrypt($product->id))}}">{{$product->name}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">
                                    <span class="mr-2 price-dc">Eg {{$product->regular_price}}</span>
                                    <span class="price-sale">Eg {{$product->discount_price}}</span>
                                    </p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="{{route('show', encrypt($product->id))}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>

                                    {{-- <a href="{{ route('cart.add', ['product' => $product->id]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a> --}}
                                    {{-- <a href="{{route('favorite.store', ['product_id' => $product->id])}}" class="heart d-flex justify-content-center align-items-center "> --}}
                                        {{-- </a> --}}
                                        @livewire('counter', ['product_id' => $product->id, 'product_name' => $product->name, 'product_price' => ($product->discount_price == 0.00) ? $product->regular_price : $product->discount_price, 'product_image' => $product->image])

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>


    </section>

    <section class="ftco-section" id="2">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Latest Products</span>
            <h2 class="mb-4">Our Products</h2>
            <p></p>
          </div>
        </div>
    	</div>
    	<div class="container">
    		<div class="row">
            @foreach ( $products as $product )

    		<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
    					<a href="{{route('show', encrypt($product->id))}}" class="img-prod"><img class="img-fluid" src="{{asset('market/images/product/'.$product->image)}}" alt="Colorlib Template">

    						{{-- <span class="status">{{ round(100 - ($product->discount_price / $product->regular_price * 100)) }}%</span> --}}
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{route('show', encrypt($product->id))}}">{{$product->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    					    <p class="price">
                                    {{-- <span class="mr-2 price-dc">Eg </span> --}}
                                    <span class="price-sale">Eg {{$product->regular_price}} </span>
                                    </p>
		    					</div>
	    					</div>
	    					<div class="bottom-area d-flex px-3">
	    						<div class="m-auto d-flex">
	    							<a href="{{route('show', encrypt($product->id))}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
	    								<span><i class="ion-ios-menu"></i></span>
	    							</a>

	    							{{-- <a href="{{ route('cart.add', ['product' => $product->id]) }}" class="buy-now d-flex justify-content-center align-items-center mx-1">
	    								<span><i class="ion-ios-cart"></i></span>
	    							</a> --}}
	    							{{-- <a href="{{route('favorite.store', ['product_id' => $product->id])}}" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a> --}}
                                    @livewire('counter', ['product_id' => $product->id, 'product_name' => $product->name, 'product_price' => $product->regular_price, 'product_image' => $product->image])

    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                @endforeach

    		</div>
    	</div>
    </section>

    		@endsection()
