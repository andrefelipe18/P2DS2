<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="">
        <div class="flex justify-center h-screen">
            <div class="text-center">
                <p class="mt-6">Ir para: </p>
                <div class="flex flex-col">
                    <a href="{{ route('clients.index') }}" class="text-blue-500">CRUD de Clientes</a>
                    <a href="{{ route('products.index') }}" class="text-blue-500">CRUD de Produtos</a>
                    <a href="{{ route('orders.index') }}" class="text-blue-500">CRUD de Pedidos</a>
                </div>
            </div>
        </div>
    </body>
</html>
