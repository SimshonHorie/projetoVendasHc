<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Cliente</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Detalhes do Cliente</h1>
        <p><strong>Nome:</strong> {{ $client->name }}</p>
        <p><strong>Email:</strong> {{ $client->email }}</p>
        <p><strong>Telefone:</strong> {{ $client->phone }}</p>
        <a href="{{ route('clients.index') }}" class="btn btn-danger">Voltar</a>
    </div>
</body>
</html>
