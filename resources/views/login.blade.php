<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login TeraSedap</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-r from-purple-400 to-pink-500 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md mx-auto bg-white rounded-md shadow-md p-8">
        <div class="text-center mb-6">
            <x-logo class="w-20 h-auto mx-auto" />
            <h1 class="text-3xl font-bold mt-4">Login</h1>
        </div>
        <form action="/auth/login" method="POST" class="space-y-4">
            @csrf
            <div>
                <input type="text" name="email" id="email" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-purple-500" placeholder="Email address" autocomplete="off">
            </div>
            <div>
                <input type="password" name="password" id="password" class="w-full px-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:border-purple-500" placeholder="Password" autocomplete="off">
            </div>
            <button type="submit" class="w-full py-2 bg-purple-500 text-white rounded-md hover:bg-purple-600 transition duration-300">Login</button>
        </form>
        <div class="mt-4 text-center">
            <p class="text-gray-700">Don't have an account?</p>
            <a href="/signup" class="text-purple-500 hover:underline">Sign Up</a>
        </div>
    </div>
</body>
</html>
