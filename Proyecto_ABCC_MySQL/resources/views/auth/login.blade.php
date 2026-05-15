<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="/form-icon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>

    <!-- JQUERY para desaparecer mensajes-->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $("#msj").fadeOut(1500);
            }, 3000);
        });
    </script>

</head>

<body>
    <div class="form-login">
        <div class="text-center mt-5">
            <h1>Sistemas escolares</h1>
            <h2>Bienvenido</h2>

            @if (session('success'))
                <div class="alert alert-success" id="msj">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <form class="mt-5" action="{{ route('login.custom') }}" method="POST">
            @csrf

            <div class="mb-4 col-lg-4 mx-auto">
                <label for="email" class="form-label fw-semibold">Correo Electrónico:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Su correo electrónico."
                    value="{{ old('email') }}" required />
                @if ($errors->has('email'))
                    <span class="text-danger small mt-1 d-block">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-4 col-lg-4 mx-auto">
                <label for="password" class="form-label fw-semibold">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Su contraseña."
                    required />
                @if ($errors->has('password'))
                    <span class="text-danger small mt-1 d-block">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="d-grid col-lg-4 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg">Iniciar sesión</button>
            </div>

        </form>

        <!-- Bloque de errores generales (opcional, por si el controlador envía errores globales) -->
        @if ($errors->any() && !$errors->has('email') && !$errors->has('password'))
            <div class="container mt-3">
                <div class="alert alert-danger col-lg-4 mx-auto" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

    </div>

    <div class="text-center text-info mt-4">
        <a href="/registration">Crear cuenta</a>
    </div>

</body>

</html>