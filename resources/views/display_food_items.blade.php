<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
</head>

<body>
    <nav>
        <center>
            <div class="logo">
                <a href="{{ route('food-items') }}">
                    <img src="{{ asset('images/terasedap_logo.png') }}" alt="logo" />
                </a>
            </div>
        </center>
        <div class="cart-icon">
            <a href="{{ route('cart.view') }}">
                <img src="{{ asset('images/cart.png') }}" alt="cart" />
            </a>
        </div>
    </nav>


    <div class="motto">Experience Indonesian <br />Culinary</div>
    <div class="centered-list">
        <ul class="horizontal-list">
            <li onclick="scrollToSection('sayuran')">Sayuran</li>
            <li onclick="scrollToSection('snacks')">Snacks</li>
            <li onclick="scrollToSection('nasi')">Nasi</li>
            <li onclick="scrollToSection('minuman')">Minuman</li>
        </ul>
    </div>

    <center>
        <center>
            <h1 class="list">Tuna</h1>
        </center>

        @foreach($foodItems->where('category_id', 5) as $item)
        <div class="menu-item">
            <a href="{{ route('fooditem.description', ['id' => $item->id]) }}">
                @if($item->image)
                <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                @else
                <p>No image available</p>
                @endif
            </a>
            <div class="food-name">{{ $item->name }}</div>
            <div class="food-price">Rp.{{ $item->price }}</div>
            <div class="quantity-buttons">
                <form
                    action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit">-</button>
                </form>
                <form
                    action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                    method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <button type="submit">+</button>
                </form>
            </div>

        </div>
        @endforeach

        <div class="scroll-target" id="nasi">
            <center>
                <h1 class="list">Nasi</h1>
            </center>
            @foreach($foodItems->where('category_id', 3) as $item)
            <div class="menu-item">
                <a href="{{ route('fooditem.description', ['id' => $item->id]) }}">
                    @if($item->image)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                    <p>No image available</p>
                    @endif
                </a>
                <div class="food-name">{{ $item->name }}</div>
                <div class="food-price">Rp.{{ $item->price }}</div>
                <div class="quantity-buttons">
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">-</button>
                    </form>
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">+</button>
                    </form>
                </div>



            </div>
            @endforeach

        </div>

        <div class="scroll-target" id="sayuran">
            <center>
                <h1 class="list">Sayuran</h1>
            </center>

            @foreach($foodItems->where('category_id', 1) as $item)
            <div class="menu-item">
                <a href="{{ route('fooditem.description', ['id' => $item->id]) }}">
                    @if($item->image)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                    <p>No image available</p>
                    @endif
                </a>
                <div class="food-name">{{ $item->name }}</div>
                <div class="food-price">Rp.{{ $item->price }}</div>
                <div class="quantity-buttons">

                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">-</button>
                    </form>
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">+</button>
                    </form>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        <div class="scroll-target" id="snacks">
            <center>
                <h1 class="list">Snack</h1>
            </center>

            @foreach($foodItems->where('category_id', 2) as $item)
            <div class="menu-item">
                <a href="{{ route('fooditem.description', ['id' => $item->id]) }}">
                    @if($item->image)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                    <p>No image available</p>
                    @endif
                </a>
                <div class="food-name">{{ $item->name }}</div>
                <div class="food-price">Rp.{{ $item->price }}</div>
                <div class="quantity-buttons">
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">-</button>
                    </form>
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">+</button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>

        <div class="scroll-target" id="minuman">
            <center>
                <h1 class="list">Minuman</h1>
            </center>
            @foreach($foodItems->where('category_id', 4) as $item)
            <div class="menu-item">
                <a href="{{ route('fooditem.description', ['id' => $item->id]) }}">
                    @if($item->image)
                    <img src="{{ asset('images/' . $item->image) }}" alt="{{ $item->name }}">
                    @else
                    <p>No image available</p>
                    @endif
                </a>
                <div class="food-name">{{ $item->name }}</div>
                <div class="food-price">Rp.{{ $item->price }}</div>
                <div class="quantity-buttons">
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">-</button>
                    </form>
                    <form
                        action="{{ route('cart.add', ['name' => $item->name, 'id' => $item->id, 'price' => $item->price]) }}"
                        method="post">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit">+</button>
                    </form>
                </div>

            </div>
            @endforeach
        </div>
    </center>

    <script>
    function scrollToSection(sectionId) {
        const section = document.getElementById(sectionId);

        if (section) {
            section.scrollIntoView({
                behavior: "smooth"
            });
        }
    }
    </script>

</body>

</html>