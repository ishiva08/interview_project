<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">


        <div class="container grid grid-cols-1 max-w-lg border p-10 rounded-lg mt-20 mx-auto justify-center items-center gap-5">
            <h1 class="mb-5">Products</h1>
            <div class="flex items-center justify-between gap-5">
                <div>Name</div>
                <div>Desc</div>
                <div>Price</div>
                <div>Image</div>
                <div>Actions</div>
            </div>
            @foreach ($products as $product)
            <div class="flex items-center justify-between gap-5">
                <div>{{ $product->name}}</div>
                <div>{{ $product->description}}</div>
                <div>{{ $product->price}}</div>
                <div>{{ $product->image}}</div>
                <div><a href="{{route('edit-product', ['product' => $product])}}">Edit</a></div>
                <div><a href="{{route('show-product', ['product' => $product])}}">Show</a></div>
            </div>
            @endforeach
        </div>
    </div>
</body>

</html>