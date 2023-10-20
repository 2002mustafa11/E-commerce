<tbody>
 @forelse ($carts as $Product)
<tr class="text-center">
    <td class="product-remove">
        <button type="button" wire:click="remove('{{$Product->rowId}}')" class="quantity-left-minus btn" data-field="">
            <span class="ion-ios-close"></span>
        </button>
        {{-- <a href="{{['rowId' => $Product->rowId]}}"></a> --}}
    </td>
    <td class="image-prod"><div class="img" style="background-image:url({{asset('market/images/product/'.$Product->options->image)}});"></div></td>
    <td class="product-name">
        <h3>{{($Product->name)}}</h3>
    </td>
    <td class="price">${{$Product->price}}</td>
    <td class="quantity">
        <div class="input-group mb-3">

            <span class="input-group-btn mr-2">
                <button type="button" wire:click="updatePlus('{{$Product->rowId}}')" class="quantity-left-minus btn" data-type="minus" data-field="">
                    <i class="ion-ios-add"></i>
                </button>
            </span>
            <input type="text" class="form-control input-number"  value="{{$Product->qty}}" min="1" max="100">
            <span class="input-group-btn ml-2">
                <button type="button" wire:click="updateMinus('{{$Product->rowId}}')" class="quantity-right-plus btn" data-type="plus" data-field="">
                    <i class="ion-ios-remove"></i>
                </button>
            </span>

        </div>
    </td>
    <td class="total">${{$Product->qty*$Product->price}}</td>
</tr><!-- END TR-->

@empty
<div class="text text-center">
    <p>Protect the health of every home</p>
    <p><a href="{{url('/shop')}}" class="btn btn-primary">Shop now</a></p>
</div>
@endforelse
</tbody>
