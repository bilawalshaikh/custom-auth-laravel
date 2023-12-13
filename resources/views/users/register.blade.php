<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="container mx-auto max-w-md py-12">

    <header class="text-center mb-8">
        <h2 class="text-2xl font-bold uppercase mb-1">Register</h2
    </header>

    <form method="POST" action="{{ route('register.submit') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <!-- Name field -->
        <div class="mb-6">
            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">First Name</label>
            <input
                type="text"
                class="border rounded py-2 px-3 text-gray-700 w-full"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your name"
            />
            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

<!-- Last Name field -->
<div class="mb-6">
    <label for="last_name" class="block text-gray-700 text-sm font-bold mb-2">Last Name</label>
    <input
        type="text"
        class="border rounded py-2 px-3 text-gray-700 w-full"
        name="last_name"
        value="{{ old('last_name') }}"
        placeholder="Enter your last name"
    />
    @error('last_name')
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>




        <!-- Email field -->
        <div class="mb-6">
            <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
            <input
                type="email"
                class="border rounded py-2 px-3 text-gray-700 w-full"
                name="email"
                value="{{ old('email') }}"
                placeholder="Enter your email"
            />
            @error('email')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Password field -->
        <div class="mb-6">
            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
            <input
                type="password"
                class="border rounded py-2 px-3 text-gray-700 w-full"
                name="password"
                placeholder="Enter your password"
            />
            @error('password')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password field -->
        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
            <input
                type="password"
                class="border rounded py-2 px-3 text-gray-700 w-full"
                name="password_confirmation"
                placeholder="Confirm your password"
            />
            @error('password_confirmation')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit button -->
        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >
                Sign Up
            </button>
        </div>

        <!-- Login link -->
        <div class="mt-4 text-center">
            <p>Already have an account? <a href="/login" class="text-blue-500 hover:text-blue-700">Login</a></p>
        </div>
    </form>

</div>

</body>
</html>
