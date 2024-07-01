<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite('resources/css/app.css')
</head>
<body>
    
    <form action="{{ route('register.post') }}" method="post" autocomplete="off" class="form">
        @csrf <!-- Token CSRF -->
        <fieldset class="form__fieldset">
            <legend class="form__title">Cadastre-se</legend>
            <label for="user" class="form__label">Usuário</label>
            <input type="text" id="user" name="user" required class="form__input" />
            @error('user')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <label for="email" class="form__label">E-mail</label>
            <input type="email" id="email" name="email" required class="form__input" />
            @error('email')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <label for="password" class="form__label">Senha</label>
            <input type="password" id="password" name="password" required class="form__input" />
            @error('password')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <div class="form__action">
                <input type="submit" value="Cadastre-se" class="btn btn-primary" />
                <p class="form__action__aside">
                    Já possui cadastro?
                    <a href="{{ route('login') }}" class="form__action__link">Faça login</a>
                </p>
            </div>
        </fieldset>
    </form>
</body>
</html>
