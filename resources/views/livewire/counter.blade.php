<div class="m-auto d-flex">
    {{-- The whole world belongs to you. --}}
    {{-- <a href="{{route('show', encrypt($product->id))}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
        <span><i class="ion-ios-menu"></i></span>
    </a> --}}

@if ($product=='product')
<p><input wire:click="addToCart('product_name', 'product_price', 'product_quantity', 'product_image')"  class="btn btn-black py-3 px-5" value="Add to Cart"></p>
@else

<a wire:click="addToCart('product_name', 'product_price', 'product_quantity', 'product_image')" class="buy-now d-flex justify-content-center align-items-center mx-1">
    <span><i class="ion-ios-cart"></i></span>
</a>

<a wire:click="favorite('product_id')"class="heart d-flex justify-content-center align-items-center ">
    <span><i class="ion-ios-heart"></i></span>
</a>
@endif
</div>
