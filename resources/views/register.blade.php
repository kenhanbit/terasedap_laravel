<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TeraSedap</title>
    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-bold mb-4">Sign Up</h1>
            <form action="{{route('signup')}}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="first_name" id="first_name" class="mb-3 p-2 rounded-md border border-gray-300" placeholder="First Name" autocomplete="off" required>
                    <input type="text" name="last_name" id="last_name" class="mb-3 p-2 rounded-md border border-gray-300" placeholder="Last Name" autocomplete="off" required>
                </div>
                <input type="date" name="birthdate" id="birthdate" class="mb-3 p-2 rounded-md border border-gray-300 w-full" required>
                <div class="grid grid-cols-2 mb-3">
                    <div class="flex items-center">
                        <input type="radio" name="gender" id="gender1" value="male" class="mr-2" required>
                        <label for="gender1">Male</label>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" name="gender" id="gender2" value="female" class="mr-2" required>
                        <label for="gender2">Female</label>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <input type="text" name="username" id="username" class="mb-3 p-2 rounded-md border border-gray-300 col-span-2" placeholder="Username" autocomplete="off" required>
                    <input type="text" name="email" id="email" class="mb-3 p-2 rounded-md border border-gray-300 col-span-2" placeholder="Email address" autocomplete="off" required>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <input type="password" name="password" id="password" class="mb-3 p-2 rounded-md border border-gray-300" placeholder="Password" autocomplete="off" required>
                    <input type="password" name="password_confirmation" id="confirm-password" class="mb-3 p-2 rounded-md border border-gray-300" placeholder="Confirm Password" autocomplete="off" required>
                </div>
                <button type="submit" class="w-full py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition duration-300 mt-4">Sign Up</button>
            </form>
            <div class="flex justify-center mt-4">
                <p class="text-sm text-gray-700">Already have an account? <a href="/login" class="text-blue-500">Login</a></p>
            </div>
        </div>
    </div>
</body>
</html>
