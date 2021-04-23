<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema - Produtos</title>

        @include('templates.css')
    </head>
    <body>
        @include('templates.header')

        <div class="container-fluid">
            <div class="row">

                @include('templates.sidebar')

                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Produtos em Estoque</h1>
                    </div>
                    <div class="table-responsive">
                        <a href="{{ route('produtos.insert') }}" class="btn btn-dark">Adicionar Novo Produto</a>
                        <table class="table table-striped table-sm">
                            @error('status')
                            <div class="alert alert-warning">{{ $message }}</div>
                            @enderror
                            @if ($errors->any())
                                <div class="alert alert-warning">
                                    An error ocurred. Please verify the following fields:<br>
                                    {{ implode('<br>', $errors->all(':message')) }}
                                </div>
                            @endif
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th>Categoria</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($data as $registry)
                                    <tr>
                                        <td>{{$registry->nome}}</td>
                                        <td>{{$registry->quantidade}}</td>
                                        <td>{{$registry->categoria}}</td>
                                        <td><a href="{{ route('produtos.view', ["idproduto" => $registry->idproduto]) }}">Editar</a></td>
                                        <td><a href="{{ route('produtos.delete', ["idproduto" => $registry->idproduto]) }}">Excluir</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>

        @include('templates.js')
    </body>
</html>
