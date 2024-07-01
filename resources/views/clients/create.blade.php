<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Cliente</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="container">
        <h1 class="title">Adicionar Cliente</h1>
        <form action="{{ route('clients.store') }}" method="POST" class="form">
            @csrf
            <fieldset class="form__fieldset">
                <label for="name" class="form__label">Nome:</label>
                <input type="text" id="name" name="name" required class="form__input">

                <label for="email" class="form__label">Email:</label>
                <input type="email" id="email" name="email" required class="form__input">

                <label for="phone" class="form__label">Telefone:</label>
                <input type="text" id="phone" name="phone" required class="form__input">

                <div class="form__action">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{ route('clients.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>
