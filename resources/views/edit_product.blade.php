<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="">
<div class="flex justify-center h-screen">
    <div class="text-center">
        <p><a href="{{route('products.index')}}" class="mt-2 btn btn-warning">Voltar</a></p>
        <h1 class="text-4xl mt-12 font-bold text-gray-100">
            <p>Editar produto: {{ $product->name }} </p>
        </h1>

        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PUT')
            @csrf
            <div class="form-control">
                <label for="name" class="label">
                    Nome
                </label>
                <input type="text" value="{{$product->name}}"
                       placeholder="Nome do cliente" class="input input-bordered input-success w-full max-w-xs" name="name" id="name" />
            </div>
            <div class="form-control">
                <label for="price" class="label">
                    Preço
                </label>
                <input type="number" value="{{$product->price}}"
                          placeholder="Preço do produto" class="input input-bordered input-success w-full max-w-xs" name="price" id="price" />
            </div>

            <div class="form-control">
                <button class="btn btn-success mt-6">Atualizar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
