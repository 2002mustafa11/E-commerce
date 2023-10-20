@extends('market.inc.master')
@section('container')
    <!-- END nav -->

    <div class="hero-wrap hero-bread" style="background-image: url({{ asset('market/images/'. config('settings.background_image1') ) }});">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span></p>
            <h1 class="mb-0 bread">Products</h1>
          </div>
        </div>
      </div>
    </div>

    @livewire('Search')

    <section class="ftco-section">
    	<div class="container">

            {{-- <div id="search-results"></div> --}}
    		<div class="row justify-content-center">
    			<div class="col-md-10 mb-5 text-center">
@if (isset($categories))

<ul class="product-category">
    <li><a href="{{url('/shop')}}" class="nav-link">All</a></li>
    {{-- @foreach ($categories as $category)
    <li><a class="active" href="{{ route('shop',['category_id'=>$category->id]) }}">{{$category->name}}</a></li>
    @endforeach --}}
    @foreach ($categories as $category)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('shop',['category_id'=>$category->id]) }}">
                {{$category->name}}
            </a>
        </li>
    @endforeach

</ul>
@endif

    			</div>
    		</div>

            <div class="row">
                @foreach ( $products as $product )
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="{{route('show', encrypt($product->id))}}" class="img-prod">
                            <img class="img-fluid" src="{{asset('market/images/product/'.$product->image)}}" alt="Colorlib Template">

                            @if ($product->offer=='1')
                            <span class="status">{{ round(100 - ($product->discount_price / $product->regular_price * 100)) }}%</span>
                            <div class="overlay"></div>

                            @endif

                            {{-- <div class="overlay"></div> --}}
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="{{route('show', encrypt($product->id))}}">{{$product->name}}</a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price">

                                        @if ($product->discount_price>0)
                                        <span class="mr-2 price-dc">${{$product->regular_price}}</span>
                                        <span class="price-sale">${{$product->discount_price}}</span>
                                        @else
                                        <span class="price-sale">${{$product->regular_price}}</span>

                                        @endif

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
            <div class="text-center col mt-5 row">
                <div class="row mt-5">
                    <div class="col text-center">
                    <div class="block-27">
                    {{ $products->links() }}
                    </div>
                    </div>
                </div>
            </div>

    	</div>
    </section>


	@endsection()
