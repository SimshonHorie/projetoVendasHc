<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <form action="{{ route('login.post') }}" method="post" autocomplete="off" class="form">
        @csrf <!-- Adicione o token CSRF -->
        <fieldset class="form__fieldset">
            <legend class="form__title">Login</legend>
            <label for="user" class="form__label">Usuário</label>
            <input type="text" id="user" name="user" required class="form__input" />
            @error('user')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <label for="password" class="form__label">Senha</label>
            <input type="password" id="password" name="password" required class="form__input" />
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            @if ($errors->has('login'))
                <span class="text-red-500">{{ $errors->first('login') }}</span>
            @endif

            <div class="form__action">
                <input type="submit" value="Login" class="btn btn-primary" />
                <a href="{{ route('register') }}" class="btn btn-secondary">Cadastre-se</a>
                <!-- <a href="#" class="form__action__aside">Esqueci a minha senha</a> -->
            </div>
        </fieldset>
    </form>
</body>
</html>
