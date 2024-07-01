<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css') <!-- Supondo que você está usando Vite para compilar seus assets -->
</head>
<body>
    <div class="container">
        <h1 class="title">Dashboard</h1>

        <div class="section">
            <h2 class="subtitle">Clientes</h2>
            <a href="{{ route('clients.create') }}" class="btn btn-primary">Adicionar Cliente</a>
        </div>

        <div class="section">
            <h2 class="subtitle">Pedidos</h2>
            <a href="{{ route('pedidos.create') }}" class="btn btn-primary">Adicionar Pedido</a>
        </div>
        <br>
        <a href="{{ route('login') }}" class="btn btn-danger">Voltar</a>

    </div>
</body>
</html>
