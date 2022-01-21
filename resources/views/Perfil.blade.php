<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>{{$user->name}}</title>
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-3">
                <img src="https://picsum.photos/200" class="img-fluid  w-100">
            </div>
            <div class="col-6">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Leopoldo Antonio</h5>
                            <h6 class="card-subtitle mb-2 text-muted">@noecende</h6>
                            <p class="card-text">
                                noecende@gmail.com
                            </p>
                            <a href="#" class="btn btn-primary">Editar Perfil</a>
                        </div>
                    </div>
                </div>
                <div class="card mt-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="https://picsum.photos/200" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <p class="card-text">Esta es una publicación</p>
                                <p class="card-text"><small class="text-muted">20/01/2021</small></p>
                                <form action="#"><button href="#" type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
