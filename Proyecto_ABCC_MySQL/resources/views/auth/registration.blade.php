<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registro - Sistemas Escolares</title>
    <link rel="icon" type="image/x-icon" href="/form-icon.png" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script type="text/javascript" src="./js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $(".errors").fadeOut(1500);
            }, 3000);
        });
    </script>
</head>

<body>
    <div class="form-signup">
        <div class="text-center mt-5">
            <h1>Sistemas escolares</h1>
            <h2>Crear cuenta</h2>
        </div>

        <form class="mt-5" action="{{ route('register.custom') }}" method="POST">
            @csrf

            <div class="mb-4 col-lg-4 mx-auto">
                <label for="name" class="form-label fw-semibold">Usuario:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Elija un nombre de usuario"
                    value="{{ old('name') }}" required />
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mb-4 col-lg-4 mx-auto">
                <label for="email" class="form-label fw-semibold">Correo Electrónico:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="ejemplo@correo.com"
                    value="{{ old('email') }}" required />
                @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="mb-4 col-lg-4 mx-auto">
                <label for="password" class="form-label fw-semibold">Contraseña:</label>
                <input type="password" placeholder="Password" id="password" class="form-control" name="password"
                    required>
                @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="d-grid col-lg-4 mx-auto">
                <button type="submit" class="btn btn-primary btn-lg">Registrarse</button>
            </div>

            <div class="text-center mt-3">
                <p>¿Ya tienes cuenta? <a href="/login" class="text-info">Inicia sesión aquí</a></p>
            </div>
        </form>

    </div>

</body>

</html>