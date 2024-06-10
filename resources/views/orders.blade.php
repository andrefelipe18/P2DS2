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
        <p><a href="{{route('welcome')}}" class="mt-2 btn btn-primary">Voltar</a></p>
        <h1 class="text-4xl mt-12 font-bold text-gray-100">
            <button class="btn text-gray-100" onclick="orders_modal.showModal()">Cadastro de Pedidos</button>
        </h1>

        <dialog id="orders_modal" class="modal">
            <div class="modal-box">
                <form method="post" action="{{ route('orders.store') }}">
                    @csrf
                    <div class="form-control">
                        <label for="status" class="label">
                            Status
                        </label>
                        <select name="status" id="status" class="input input-bordered input-primary w-full max-w-xs">
                            <option value="Pendente">Pendente</option>
                            <option value="Em andamento">Em andamento</option>
                            <option value="Concluído">Concluído</option>
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="client_id" class="label">
                            Cliente
                        </label>
                        <select name="client_id" id="client_id" class="input input-bordered input-primary w-full max-w-xs">
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <label for="product_id" class="label">
                            Produto
                        </label>
                        <select name="product_id" id="product_id" class="input input-bordered input-primary w-full max-w-xs">
                            @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-control">
                        <button class="btn btn-primary mt-6">Cadastrar</button>
                    </div>
                </form>
            </div>
        </dialog>

        <p class="mt-6 text-gray-100">Pedidos cadastrados:</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                <tr>
                    <th class="text-primary">ID</th>
                    <th class="text-primary">Status</th>
                    <th class="text-primary">Cliente</th>
                    <th class="text-primary">Produto</th>
                    <th class="text-primary">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <th>{{ $order->id }}</th>
                        <td>{{ $order->status }}</td>
                        <td>{{ $order->client->name }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td class="flex gap-2">
                            <button class="btn btn-primary"><a href="{{route('orders.edit', $order->id)}}">Editar</a></button>
                            <form method="post" action="{{ route('orders.destroy', $order->id) }}">
                                @csrf
                                @method('delete')
                                <button class="btn btn-error">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
