<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Terasedap - Register</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    </head>
    <style>


    </style>
    <body>
        <x-logo />
        <div class="container">
            <div id="register">
                <div id="form">
                    <p class="h3">Register</p>
                    <form action="{{ route('register.store') }}" method="post">
                        @csrf
                        @method('POST')
                        <div style="display: flex; justify-content:space-between">
                            <div class="input-group">
                                <label for="firstname" class="input-label">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="input-field" style="width:10rem;">
                            </div>
                            <div class="input-group">
                                <label for="lastname" class="input-label">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="input-field" style="width:10rem;">
                            </div>
                        </div>
                        <div class="input-group">
                            <label for="email" class="input-label">Email</label>
                            <input type="text" name="email" id="email" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="password" class="input-label">Password</label>
                            <input type="password" name="password" id="password" class="input-field">
                        </div>
                        <div class="input-group">
                            <label for="confirm_password" class="input-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" id="confirm_password" class="input-field">
                        </div>
                            <button class="sign-button" type="submit">
                                Sign Up
                            </button>
                            Already have an account? <a href="{{ route('login') }}">Login</a>
                    </form>
                </div>
            </div>

        </div>
    </body>
</html>