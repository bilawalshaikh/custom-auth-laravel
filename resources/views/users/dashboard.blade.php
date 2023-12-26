@extends('app')
@section('content')
    

@auth
    <div class="flex justify-center items-center mt-10">
        <p class="bg-green-500 text-white px-6 py-2 rounded-md mr-4 transition duration-300 ease-in-out hover:bg-green-600">Welcome</p>
        <p class="bg-blue-500 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out hover:bg-blue-600">{{ auth()->user()->name }}</p>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="flex justify-center items-center mt-4">
        @csrf
        <button class="bg-red-500 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out hover:bg-red-600" type="submit">Logout</button>
    </form>
@else
    <div class="flex justify-center items-center mt-10">
        <a href="{{ route('login') }}" class="bg-green-500 text-white px-6 py-2 rounded-md mr-4 transition duration-300 ease-in-out hover:bg-green-600">Login</a>
        <a href="{{ route('register') }}" class="bg-blue-500 text-white px-6 py-2 rounded-md transition duration-300 ease-in-out hover:bg-blue-600">Register</a>
    </div>
@endauth

@endsection

