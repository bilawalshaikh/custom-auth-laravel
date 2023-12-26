@extends('app')
@section('content')
<div class="container mx-auto max-w-md py-12">
    <header class="text-center mb-8">
        <h2 class="text-2xl font-bold uppercase mb-1">Forgot Password</h2>
    </header>

    @if(session()->has('email'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show = false,5000)" x-show="show" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $error }}</span>
    </div>
@endif
{{--  --}}

@if($errors->has('email'))
    <div x-data="{show:true}" x-init="setTimeout(() => show = false, 5000)" x-show="show" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $errors->first('email') }}</span>
    </div>
@endif

{{--  --}}
@if(session()->has('success'))
    <div x-data="{show:true}" x-init="setTimeout(()=> show = false,5000)" x-show="show" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
    </div>
@endif






<form method="POST" action="{{ route('forgot-password.email') }}">
    @csrf
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
    <input  
     class="border rounded py-2 px-3 text-gray-700 w-full"
     name="email"
     placeholder="Enter your email" 
     type="email" 
     {{-- required --}}
     >
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">Send Reset Link</button>

    {{-- @error('email')
    <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
    @enderror --}}
</form>
</div>
@endsection

