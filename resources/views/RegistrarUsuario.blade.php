<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registro</title>
</head>
<body>
    <div class="container mt-5">
        <h1>Registro</h1>
        <form action="/usuarios" method="post" class="needs-validation">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @endError" id="nombre" name="nombre" value="{{old('nombre', '')}}">
                        @error('nombre')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endError
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control @error('apellidos') is-invalid @endError" id="apellidos" name="apellidos" value="{{old('apellidos', '')}}">
                        @error('apellidos')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @endError
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{old('email', '')}}">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="{{old('username', '')}}">
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" value="{{old('password', '')}}">
            </div>
            <div class="col-md-5 mb-3">
                <label for="confirm" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirm" name="confirm" value="{{old('confirm', '')}}">
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
        </form>
    </div>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>