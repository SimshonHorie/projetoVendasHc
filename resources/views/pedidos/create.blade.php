<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Pedido</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Adicionar Pedido</h1>

        @if($pecas)
            <ul>
                @foreach($pecas as $peca)
                    <li>{{ $peca['descricao'] }} - {{ $peca['valor'] }}</li>
                @endforeach
            </ul>
        @else
            <p>Nenhuma peça disponível.</p>
        @endif

        <div class="form__action">
            <a href="{{ route('pedidos.index') }}" class="btn btn-danger">Cancelar</a>
            <a href="{{ route('dashboard') }}" class="btn btn-danger">Voltar</a>
        </div>
    </div>
</body>
</html>
