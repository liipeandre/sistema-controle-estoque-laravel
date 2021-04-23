<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sistema - Login</title>

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/signin.css') }}" rel="stylesheet">
    </head>

    <body class="text-center">
        <main class="form-signin">
            <form action="{{ route('usuario.login') }}" method="post">
                @csrf
                <img class="mb-4" src="{{ asset('assets/logo/bootstrap-logo.svg') }}" alt="Logo" width="72" height="57">

                @if($errors->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('error')}}
                    </div>
                @endif

                <label for="login" class="visually-hidden">Login</label>
                <input type="text" name=usuario id="login" class="form-control" placeholder="Login" required autofocus>

                <label for="senha" class="visually-hidden">Senha</label>
                <input type="password" name=senha id="senha" class="form-control" placeholder="Senha" required>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                <p class="mt-5 mb-3 text-muted">&copy;André Felipe 2021-</p>
            </form>
        </main>
    </body>
</html>
