<a href="{{ route('food-item.edit', $detail->id)}}">
    <div wire:transition class="admin-menu">
        <div class="menu-detail" style="display: flex; flex-direction:column; justify-content:space-between">
            <div>
                {{ $detail->name }}
            </div>
            <div>
                Rp. {{ number_format($detail->price, 0, '', '.')}}
            </div>
        </div>
        <div class="menu-image">
            <img src="{{ asset('images/' . $detail->image) }}" alt="{{ $detail->name }}">
        </div>
    </div>
</a>