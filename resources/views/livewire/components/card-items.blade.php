<div class="cart-item">
    <a href="{{route('fooditem.description', ['id' => $food->id])}}">
        <div class="item-detail">
            <div class="name-description">
                    <p class="item-name">
                        {{ $food->name }}
                    </p>
                    <p class="item-note">
                        {{ $food->notes }}
                    </p>
            </div>
            <div class="item-image">
                <img src="{{asset('images/'.$food->image)}}" alt="">
            </div>
        </div>
        <div class="item-price">
            Rp {{ number_format($detail->food_price, 0, '', '.')}}
        </div>
    </a>
    <div class="order-detail">
        <div>
            <button class="add-notes"><x-iconsax-bol-note-21 style="height: 16px; margin-right:4px" />notes</button>
        </div>
        <div class="item-button">
        @if ($detail->quantity > 1)
        <button wire:click.prevent="decrement({{ $detail->id }})" wire:loading.attr="disabled" class="quantity-item"><x-iconsax-out-minus style="width:16px" /></button>
        @else
        <button wire:click.prevent="remove({{$detail->id}})" wire:loading.attr="disabled" class="quantity-item"><x-iconsax-out-minus style="width:16px; height:16px" />
        </button>
        @endif
        <input type="text" class="cart-item-quantity" value="{{ $detail->quantity }}" disabled />
        <button wire:click.prevent="increment({{$detail->id}})" wire:loading.attr="disabled" class="quantity-item"><x-iconsax-out-add style="width:16px; height:16px" /></button>
        </div>
    </div>
</div>
