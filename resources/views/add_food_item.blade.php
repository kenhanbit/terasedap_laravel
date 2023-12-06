<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Terasedap | Add Menu</title>
</head>

<body>

    <div class="navbar">
        <div>
            <img src="{{ asset('images/terasedap_logo.png') }}" alt="logo" />
        </div>
        <ul>
            <li><a href="{{ route('admin.orders')}}">Orders</a></li>
            <li><a href="{{ route('admin.history')}}">Order History</a></li>
            <li><a href="{{route('admin.menu')}}">Menu Management</a></li>
            <li><a href="{{route('admin.category')}}">Menu Management</a></li>
            <li><a href="{{ route('logout')}}">Logout</a></li>
        </ul>
    </div>

    <div class="welcome-heading">
        <h1>Add New Menu</h1>

    <center>
        <form action="{{ route('fooditem.store') }}" method="post" enctype="multipart/form-data" style="display: inline;">
            @csrf
            <input style="width: 400px; height: 36px;margin-bottom: 12px;" type="text" name="name" placeholder="Food Item Name"><br>
            <input style="width: 400px; height: 36px;margin-bottom: 12px;" type="number" name="price" placeholder="Price"><br>
            <textarea name="description" placeholder="Description" rows="5" cols="60"></textarea><br>
            <select style="width: 400px; height: 36px;margin-bottom: 12px;" name="category">
                <option value="">Select Category</option>
                @foreach($categories as $categoryId => $categoryName)
                <option value="{{ $categoryId }}">{{ $categoryName }}</option>
                @endforeach
            </select><br>
            <input style="width: 400px; height: 36px;margin-bottom: 12px;" type="file" name="image"><br>
            <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                <img src="images/addnewbutton.png" alt="Add">
            </button>
        </form>
    </center>
</body>

<script>
    function filterFoodItems(categoryId) {
        var menuItems = document.querySelectorAll('.menu-item-admin');

        menuItems.forEach(function (item) {
            var category = item.querySelector('.food-categories-admin').innerText.trim();

            if (categoryId === 'all' || category === categoryId) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    }
</script>


</html>

