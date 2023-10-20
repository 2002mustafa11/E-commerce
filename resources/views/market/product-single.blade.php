@extends('market.inc.master')
@section('container')
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('market/images/'. config('settings.background_image1') ) }});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
            <h1 class="mb-0 bread">Product Single</h1>
          </div>
        </div>
      </div>
    </div>

    {{-- <section class="ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
              <a href="images/product-1.jpg" class="image-popup">
                <img src="{{ asset('market/images/product/'.$id->image) }}" class="img-fluid" alt="Colorlib Template">
              </a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
              <h3>{{ $id->name }}</h3>
              <div class="rating d-flex">
                <!-- تقييم المنتج -->
              </div>
              <p class="price"><span>${{ $id->discount_price }}</span></p>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until.</p>
              <div class="row mt-4">
                <div class="col-md-6">
                  <div class="form-group d-flex">
                    <div class="select-wrap">
                      <!-- اختيار المقاس -->
                    </div>
                  </div>
                </div>
                <div class="input-group col-md-6 d-flex mb-3">

                    <form action="{{ route('cart.product.store') }}" method="post">
                      @csrf
                      @error('product_id')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                      <input type="hidden" name="product_id" value="{{ $id->id }}">
                      <input type="hidden" name="price" value="{{ $id->regular_price }}">
                      <input type="hidden" name="total" value="{{ $id->regular_price }}">
                      <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="10">
                      <span class="input-group-btn ml-2">

                      <button type="submit" class="btn btn-black py-3 px-5">Add to Cart</button> <!-- زر إضافة إلى السلة -->
                    </form>
                  </div>
                <div class="col-md-12">
                  <p style="color: #000;">600 kg available</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section> --}}

    {{-- <section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="{{asset('market/images/product/'.$id->image)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$id->name }}</h3>
    				<div class="rating d-flex">

						</div>
    				<p class="price"><span>${{$id->discount_price}}</span></p>
    				<p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until.
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">

	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
                        <form action="{{route('cart.product.store')}}" method="post">
                            @csrf
                            @error('product_id')
                            {{ $message }}
                            @enderror
                        <input type="hidden" name="product_id" value="{{$id->id}}">
                        <input type="hidden" name="price" value="{{$id->regular_price}}">
                        <input type="hidden" name="total" value="{{$id->regular_price}}">

                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="10">
                        <div class="w-100">
                            <span class="input-group-btn ml-2">
                                <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                    <i class="ion-ios-add"></i>
                                </button>
                            </span>
                        </div>

                            <p><a class="btn btn-black py-3 px-5"><button type="submit"></button>Add to Cart</a></p>
                        </form>

	          	</div>

	          	<div class="col-md-12">
	          		<p style="color: #000;">600 kg available</p>
	          	</div>
          	</div>

    			</div>
    		</div>
    	</div>
    </section> --}}

    {{-- <div class="rating d-flex">
        <p class="text-left mr-4">
          <a href="#" class="mr-2">5.0</a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
          <a href="#"><span class="ion-ios-star-outline"></span></a>
        </p>
        <p class="text-left mr-4">
          <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
        </p>
        <p class="text-left">
          <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
        </p>
      </div> --}}

      <section class="ftco-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
              <a href="images/product-1.jpg" class="image-popup"><img src="{{ asset('market/images/product/'.$product->image) }}" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
              <h3>{{ $product->name }}</h3>

              <div class="rating d-flex">
                <p class="text-left mr-4">
                    <a href="#" class="mr-2">5.0</a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="#"><span class="ion-ios-star-outline"></span></a>
                    <a href="{{ route('review', ['id' => $product->id, 'review' => '5']) }}">
                        <span class="ion-ios-star-outline"></span>
                    </a>
                </p>
            </div>

              <p class="price"><span>${{ ($product->discount_price == 0.00) ? $product->regular_price : $product->discount_price}}</span></p>
              <p>{{$product->description}}</p>
              <div class="row mt-4">

                <div class="w-100"></div>

                @livewire('counter', ['product' => 'product','product_id' => $product->id, 'product_name' => $product->name, 'product_price' => ($product->discount_price == 0.00) ? $product->regular_price : $product->discount_price, 'product_image' => $product->image])

                {{-- <form action="{{ route('cart.add', ['product' => $product->id]) }}" method="get">
                  <div class="input-group col-md-6 d-flex mb-3">
                    @csrf
                    @error('product_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                  </div>
                  <div class="w-100"></div>
                  <p><input type="submit" class="btn btn-black py-3 px-5" value="Add to Cart"></p>
                </form> --}}

              </div>
            </div>
          </div>
        </div>
      </section>





    <section class="ftco-section">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Products</span>
            <h2 class="mb-4">Related Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
    	</div>
    	<div class="container">
    		<div class="row">
    			@foreach ( $products as $product )

    		<div class="col-md-6 col-lg-3 ftco-animate">
    				<div class="product">
                        <img class="img-fluid" src="{{asset('market/images/product/'.$product->image)}}" alt="Colorlib Template">
    					<a href="{{route('show', encrypt($product->id))}}" class="img-prod">

    						<span class="status">{{ round(100 - ($product->discount_price / $product->regular_price * 100)) }}%</span>
    						<div class="overlay"></div>
    					</a>
    					<div class="text py-3 pb-4 px-3 text-center">
    						<h3><a href="{{route('show',$product->id)}}">{{$product->name}}</a></h3>
    						<div class="d-flex">
    							<div class="pricing">
		    					    <p class="price">
                                    <span class="mr-2 price-dc">${{$product->regular_price}}</span>
                                    <span class="price-sale">${{$product->discount_price}}</span>
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
	    							</a>
	    							<a href="{{route('favorite.store', ['product_id' => $product->id])}}" class="heart d-flex justify-content-center align-items-center ">
	    								<span><i class="ion-ios-heart"></i></span>
	    							</a> --}}
                                    @livewire('counter', ['product_id' => $product->id, 'product_name' => $product->name, 'product_price' => ($product->discount_price == 0.00) ? $product->regular_price : $product->discount_price, 'product_image' => $product->image])

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
