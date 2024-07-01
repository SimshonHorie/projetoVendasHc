<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pedidos</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Lista de Pedidos</h1>
        <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Adicionar Pedido</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Descrição</th>
                    <th>Data do Pedido</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pedidos as $pedido)
                    <tr>
                        <td>{{ $pedido->descricao }}</td>
                        <td>{{ $pedido->data_pedido }}</td>
                        <td>{{ $pedido->status }}</td>
                        <td>
                            <a href="{{ route('pedidos.show', $pedido->id) }}" class="btn btn-secondary">Ver</a>
                            <a href="{{ route('pedidos.edit', $pedido->id) }}" class="btn btn-secondary">Editar</a>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                <!-- Listagem das peças -->
                @if(!empty($pecas))
                    <tr>
                        <td colspan="4">
                            <h3>Lista de Peças</h3>
                            @foreach($pecas as $peca)
                                <p>{{ $peca['nome'] }} - {{ $peca['preco'] }}</p>
                            @endforeach
                        </td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</body>
</html>
