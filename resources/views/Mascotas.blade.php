<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Mascotas</title>
</head>

<body>
    <div class="container mt-3">
        <h1 class="display-4 text-center">Mascotas</h1>
        <div class="row">
            @if($mascotas->count() > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Especie</th>
                        <th scope="col">Edad</th>
                        <th scope="col">Fecha de nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($mascotas as $mascota)
                    <tr>
                        <th scope="row">{{ $mascota->nombre }}</th>
                        <td>{{ $mascota->especie }}</td>
                        <td>{{ $mascota->edad }}</td>
                        <td>{{ $mascota->fecha }}</td>
                        <td>
                            <form action="/mascotas/{{$mascota->id}}/edit" method="get"><button class="btn btn-primary"
                                    type="submit">Editar</button>
                            </form>
                        </td>
                        <td>
                            <form action="/mascotas/{{$mascota->id}}" method="post">@method('DELETE')<button
                                    class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <h1 class="display-6 text-center mt-3">No tienes mascotas registradas</h1>
            @endif
            <div class="row">
                <form action="/mascotas/create" method="get"><button class="btn btn-primary" type="submit">Crear
                        mascota</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
