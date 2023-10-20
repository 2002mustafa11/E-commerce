<div>

    {{-- <section class="ftco-section"> --}}

    	<div class="container">
    		<div class="row">
            @foreach ( $results as $product )
{{-- {{$product->name}} --}}
    		<div class="col-md-6 col-lg-3">
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
                                    @livewire('counter', ['product_id' => $product->id, 'product_name' => $product->name, 'product_price' => ($product->discount_price == 0.00) ? $product->regular_price : $product->discount_price, 'product_image' => $product->image])
    							</div>
    						</div>
    					</div>
    				</div>
    			</div>
                @endforeach

    		</div>
    	</div>
    {{-- </section> --}}
    <input type="text" wire:model="searchTerm" wire:keydown="search" placeholder="ابحث عن المنتجات..." class="form-control">

</div>
