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

        <div class="container flex justify-center items-center gap-5 mt-20">
            <div class="grid grid-cols-1 gap-10">

                <h1 class="">Create Product</h1>
                <form method="POST" action="{{route('store-product')}}" class="border p-10 bg-white rounded-sm">
                    @csrf

                    <div class="grid grid-cols-1 gap-5">
                        <div class="flex justify-start gap-5">
                            <label>Name : </label>
                            <input class="p-2 border" type="text" name="name">
                        </div>
                        <div class="flex justify-start gap-5">
                            <label>Description : </label>
                            <input class="p-2 border" type="text" name="description">
                        </div>
                        <div class="flex justify-start gap-5">
                            <label>Price : </label>
                            <input class="p-2 border" type="text" name="price">
                        </div>
                        <div class="flex justify-start gap-5">
                            <label>Image : </label>
                            <input class="p-2 border" type="file" name="image">
                        </div>
                        <button type="submit" class="">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>