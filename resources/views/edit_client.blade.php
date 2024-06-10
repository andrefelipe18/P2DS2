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
        <p><a href="{{route('clients.index')}}" class="mt-2 btn btn-warning">Voltar</a></p>
        <h1 class="text-4xl mt-12 font-bold text-gray-100">
            <p>Editar {{ $client->name }} </p>
        </h1>

        <form method="post" action="{{ route('clients.update', $client->id) }}">
            @method('PUT')
            @csrf
            <div class="form-control">
                <label for="name" class="label">
                    Nome
                </label>
                <input type="text" value="{{$client->name}}"
                       placeholder="Nome do cliente" class="input input-bordered input-warning w-full max-w-xs" name="name" id="name" />
            </div>
            <div class="form-control">
                <label for="email" class="label">
                    E-mail
                </label>
                <input type="email" value="{{$client->email}}"
                       placeholder="E-mail do cliente" class="input input-bordered input-warning w-full max-w-xs" name="email" id="email" />
            </div>
            <div class="form-control">
                <label for="phone" class="label">
                    Telefone
                </label>
                <input type="tel" value="{{$client->phone}}"
                       placeholder="Telefone do cliente" class="input input-bordered input-warning w-full max-w-xs"  name="phone" id="phone" />
            </div>

            <div class="form-control">
                <button class="btn btn-warning mt-6">Atualizar</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>
