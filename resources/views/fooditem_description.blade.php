<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Terasedap | Description</title>
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
    </nav>

    <div class="motto">Experience Indonesian <br />Culinary</div>

    <br />
    <div class="container">
        <center>
            @if($foodItem->image)
            <img src="{{ asset('images/' . $foodItem->image) }}" alt="{{ $foodItem->name }}">
            @else
            <p>No image available</p>
            @endif
        </center>
        <div class="text">
            <h2 class="title">{{ $foodItem->name }}</h2>
            <div class="food-price">Rp.{{ $foodItem->price }}</div>
            <p>
                {{ $foodItem->description }}
            </p>
        </div>
    </div>

</body>

</html>