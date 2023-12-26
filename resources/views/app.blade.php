<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="antialiased">
    <header class="bg-blue-500 text-white py-4">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                    <!-- Replace this with your Laravel icon SVG or image -->
                    <path fill-rule="evenodd" d="..."/>
                </svg>
                <span class="text-xl font-semibold">
                    <a href="{{route('login')}}">Auth App</a></span>
            </div>
            <!-- Add other navigation elements, links, or user information here -->
        </div>
    </header>

    @yield('content')

   
  

</body>
</html>
