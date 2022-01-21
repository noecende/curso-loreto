<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registro</title>
</head>

<body>
    <div class="container mt-3">
        <div class="mx-auto col-8">
            <h1 class="display-4">Registro</h1>
            <form action="/users" method="post" class="needs-validation">
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('name') is-invalid @endError" id="name"
                                name="name" value="{{old('name', '')}}">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @endError
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Apellidos</label>
                            <input type="text" class="form-control @error('lastname') is-invalid @endError"
                                id="lastname" name="lastname" value="{{old('lastname', '')}}">
                            @error('lastname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @endError
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @endError" id="email"
                            name="email" value="{{old('email', '')}}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @endError
                    </div>
                </div>

                <div class="col-4">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @endError" id="username"
                            name="username" value="{{old('username', '')}}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @endError
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @endError"
                                id="telefono" name="telefono" value="{{old('telefono', '')}}">
                            @error('telefono')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @endError
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="chip" class="form-label">Chip</label>
                            <input type="text" class="form-control @error('chip') is-invalid @endError" id="chip"
                                name="chip" value="{{old('chip', '')}}">
                            @error('chip')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @endError
                        </div>
                    </div>
                </div>

                <div class="col-md-5 mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @endError" id="password"
                        name="password" value="{{old('password', '')}}">
                    @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @endError
                </div>
                <div class="col-md-5 mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @endError" id="password_confirmation"
                        name="password_confirmation" value="{{old('password_confirmation', '')}}">
                    @error('password_confirmation')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @endError
                </div>
                <div class="mb-3 col-6">
                    <label for="image" class="form-label">Selecciona una imagen</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
