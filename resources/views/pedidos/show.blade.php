<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Pedido</title>
    <!-- Incluir aqui os links para folhas de estilo se necessário -->
</head>
<body>
    <div class="container">
        <h1 class="title">Detalhes do Pedido</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Descrição: {{ $pedido->descricao }}</h5>
                <p class="card-text">Data do Pedido: {{ $pedido->data_pedido }}</p>
                <p class="card-text">Status: {{ $pedido->status }}</p>
                <a href="{{ route('pedidos.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
