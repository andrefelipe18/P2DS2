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
        <h1 class="text-4xl mt-12 font-bold text-gray-100">
            <button class="btn text-gray-100" onclick="clients_modal.showModal()">Cadastro de Produtos</button>
        </h1>

        <dialog id="clients_modal" class="modal">
            <div class="modal-box">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-control">
                        <label for="name" class="label">
                            Nome
                        </label>
                        <input type="text" placeholder="Nome do cliente" class="input input-bordered input-success w-full max-w-xs" name="name" id="name" />
                    </div>
                    <div class="form-control">
                        <label for="email" class="label">
                            Preço
                        </label>
                        <input type="number" placeholder="Preço do produto" class="input input-bordered input-success w-full max-w-xs" name="price" id="price" />
                    </div>

                    <div class="form-control">
                        <button class="btn btn-success mt-6">Cadastrar</button>
                    </div>
                </form>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn btn-error">Fechar</button>
                    </form>
                </div>
            </div>
        </dialog>

        <p class="mt-6 text-gray-100">Produtos cadastrados:</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                <tr>
                    <th class="text-success">ID</th>
                    <th class="text-success">Nome</th>
                    <th class="text-success">Preço</th>
                    <th class="text-success">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->name }}</td>
                        <td>R${{ $product->price }}</td>
                        <td class="flex gap-2">
                            <button class="btn btn-success"><a href="{{route('products.edit', $product->id)}}">Editar</a></button>
                            <form method="post" action="{{ route('products.destroy', $product->id) }}">
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
