<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Document</title>
</head>

<body>

    <div class="navbar">
        <div>
            <img src="images/terasedap_logo.png" alt="" />
        </div>
        <ul>
            <li><a href="#">Menu</a></li>
            <li><a href="{{ route('orders.history') }}">Orders</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>

    <div class="welcome-heading">
        <h1>Welcome to the admin panel</h1>
        <h2>Menu</h2>
        <div class="menu-admin">
            @foreach($foodItems as $foodItem)
            <div class="menu-item-admin">
                @if($foodItem->image)
                <img src="{{ asset('images/' . $foodItem->image) }}" class="menu-img" alt="Food Image">
                @endif
                <div class="food-name-admin">{{ $foodItem->name }}</div>
                <div class="food-price-admin">Rp{{ $foodItem->price }}</div>
                <div class="food-name-admin">{{ $foodItem->description }}</div>
                <div class="edit-delete">
                    <a href="{{ route('food_items.editForm', $foodItem->id) }}">
                        <img src="images/editbutton.png" class="btn-img" alt="">
                    </a>
                    <form method="POST" action="{{ route('food_items.destroy', $foodItem->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                            <img src="images/deletebutton.png" class="btn-img" alt="Delete">
                        </button>
                    </form>

                </div>
            </div>
            @endforeach
        </div>
    </div>


    <center>
        <h1>Add New Menu Item</h1>
        <form action="{{ route('fooditem.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Food Item Name"><br>
            <input type="number" name="price" placeholder="Price"><br>
            <textarea name="description" placeholder="Description"></textarea><br>
            <select name="category">
                <option value="">Select Category</option>
                @foreach($categories as $categoryId => $categoryName)
                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                @endforeach
            </select><br>
            <input type="file" name="image"><br>
            <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                <img src="images/addnewbutton.png" alt="Add">
            </button>
        </form>
    </center>
</body>

</html>