<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar mascota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mx-auto col-6">
            <!--Dentro de la sintaxis puede ir cualquier expresión de php -->
            <h1 class="display-4">Editar Mascota</h1>
            <form action="/mascotas/{{$mascota->id}}" method="post" class="needs-validation">
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control @error('nombre') is-invalid @endError" id="nombre"
                                name="nombre" value="{{old('nombre', $mascota->nombre)}}">
                            @error('nombre')
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
                            <label for="especie" class="form-label">Especie</label>
                            <input type="text" class="form-control @error('especie') is-invalid @endError" id="especie"
                                name="especie" value="{{old('especie', $mascota->especie)}}">
                            @error('especie')
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
                            <label for="edad" class="form-label">Edad</label>
                            <input type="text" class="form-control @error('edad') is-invalid @endError" id="edad"
                                name="edad" value="{{old('edad', $mascota->edad)}}">
                            @error('edad')
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
                            <label for="fecha" class="form-label">Fecha de nacimiento</label>
                            <input type="date" class="form-control @error('fecha') is-invalid @endError" id="fecha"
                                name="fecha" value="{{old('fecha', $mascota->fecha)}}">
                            @error('fecha')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @endError
                        </div>
                    </div>
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
