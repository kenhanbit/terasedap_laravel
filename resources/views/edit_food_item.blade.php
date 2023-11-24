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
            <img src="{{ asset('images/terasedap_logo.png') }}" alt="logo" />
        </div>
        <ul>
            <li><a href="#">Menu</a></li>
            <li><a href="#">Orders</a></li>
            <li><a href="#">Logout</a></li>
        </ul>
    </div>


    <center>
        <div>

            <h2>Edit Food Item</h2>

            <form method="POST" action="{{ route('food-item.update', $foodItem->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $foodItem->name }}">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description">{{ $foodItem->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">Price:</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ $foodItem->price }}">
                </div>

                <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                        @foreach($categories as $categoryId => $categoryName)
                        <option value="{{ $categoryId }}" @if($categoryId==$foodItem->category_id) selected
                            @endif>{{ $categoryName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image">Upload Image:</label>
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                <button type="submit" style="background: none; border: none; padding: 0; margin: 0; cursor: pointer;">
                    <img src="{{ asset('images/updatebutton.png') }}" alt="Add">
                </button>
            </form>

        </div>
    </center>
</body>

</html>