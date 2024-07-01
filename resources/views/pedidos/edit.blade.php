<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pedido</title>
    <!-- Incluir aqui os links para folhas de estilo se necessário -->
</head>
<body>
    <div class="container">
        <h1 class="title">Editar Pedido</h1>
        <form action="{{ route('pedidos.update', $pedido->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="data_pedido">Data do Pedido:</label>
                <input type="date" name="data_pedido" id="data_pedido" class="form-control" value="{{ $pedido->data_pedido }}" required>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Pendente" @if($pedido->status === 'Pendente') selected @endif>Pendente</option>
                    <option value="Concluído" @if($pedido->status === 'Concluído') selected @endif>Concluído</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
