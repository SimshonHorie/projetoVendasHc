<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <!-- Incluir CSS do Bootstrap ou outro framework -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Lista de Clientes</h1>
        <!-- Formul�rio de filtro -->
        <form action="{{ route('clients.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar por nome, email ou telefone" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
        <table class="table">
            <thead>
            <tr>
                    <th><a href="{{ route('clients.index', ['orderBy' => 'name', 'orderDirection' => $orderDirection == 'asc' && $orderBy == 'name' ? 'desc' : 'asc', 'search' => request('search')]) }}">Nome</a></th>
                    <th><a href="{{ route('clients.index', ['orderBy' => 'email', 'orderDirection' => $orderDirection == 'asc' && $orderBy == 'email' ? 'desc' : 'asc', 'search' => request('search')]) }}">Email</a></th>
                    <th><a href="{{ route('clients.index', ['orderBy' => 'phone', 'orderDirection' => $orderDirection == 'asc' && $orderBy == 'phone' ? 'desc' : 'asc', 'search' => request('search')]) }}">Telefone</a></th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-danger">Ver</a>
                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-danger">Editar</a>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Exibi��o da pagina��o com estilos personalizados -->
        <div class="pagination">
        {{ $clients->links('pagination::simple-bootstrap-4') }}
        </div>
        
        <a href="{{ route('dashboard') }}" class="btn btn-danger">Voltar</a>
    </div>
</body>
</html>
