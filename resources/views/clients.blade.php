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
        <p><a href="{{route('welcome')}}" class="mt-2 btn btn-warning">Voltar</a></p>
        <h1 class="text-4xl mt-12 font-bold text-gray-100">
            <button class="btn text-gray-100" onclick="clients_modal.showModal()">Cadastro de Clientes</button>
        </h1>

        <dialog id="clients_modal" class="modal">
            <div class="modal-box">
                <form method="post" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="form-control">
                        <label for="name" class="label">
                            Nome
                        </label>
                        <input type="text" placeholder="Nome do cliente" class="input input-bordered input-warning w-full max-w-xs" name="name" id="name" />
                    </div>
                    <div class="form-control">
                        <label for="email" class="label">
                            E-mail
                        </label>
                        <input type="email" placeholder="E-mail do cliente" class="input input-bordered input-warning w-full max-w-xs" name="email" id="email" />
                    </div>
                    <div class="form-control">
                        <label for="phone" class="label">
                            Telefone
                        </label>
                        <input type="tel" placeholder="Telefone do cliente" class="input input-bordered input-warning w-full max-w-xs"  name="phone" id="phone" />
                    </div>

                    <div class="form-control">
                        <button class="btn btn-warning mt-6">Cadastrar</button>
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

        <p class="mt-6 text-gray-100">Clientes cadastrados:</p>
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                <tr>
                    <th class="text-warning">ID</th>
                    <th class="text-warning">Nome</th>
                    <th class="text-warning">Email</th>
                    <th class="text-warning">Telefone</th>
                    <th class="text-warning">Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr>
                        <th>{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td class="flex gap-2">
                            <button class="btn btn-warning"><a href="{{route('clients.edit', $client->id)}}">Editar</a></button>
                            <form method="post" action="{{ route('clients.destroy', $client->id) }}">
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
