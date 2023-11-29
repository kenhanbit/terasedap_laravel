<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" />
    <title>Thank You</title>
</head>
<body>
    <div class="thankyou-container">
        <center>
            <div class="logo">
                <a href="{{ route('food-items') }}">
                    <img src="{{ asset('images/terasedap_logo.png') }}" alt="logo" />
                </a>
            </div>
        </center>
        <div class="thankyou">
            <p>Thank You For Ordering!</p>
            <a href="">Download Receipt</a>
        </div>
        <div class="back-to-home">
            <a href="">Back to Home</a>
        </div>
    </div>
</body>
</html>