@extends('app')

@section('content')

<div class="container mx-auto max-w-md py-12">

    <header class="text-center mb-8">
            <h2 class="text-2xl font-bold uppercase mb-1 border-b-2 border-blue-500 pb-2">Login</h2>
        </header>

        
        @if(session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ $error }}</span>
        </div>
    @endif
    
    @if(session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show = false,5000)" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif
    



    <form method="POST" action="{{route('login')}}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
      
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

      <!-- Submit button -->
<div class="flex items-center justify-between">
    <button
        type="submit"
        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
    >
        Log in
    </button>

    {{-- Forgot password --}}
            <a href="{{ route('forgot-password') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded ml-4">
                Forgot Password
            </a>
</div>

        <!-- Login link -->
        <div class="mt-4 text-center">
            <p>Not have an account? <a href="/register" class="text-blue-500 hover:text-blue-700">Register</a></p>
        </div>
    </form>

</div>
@endsection
