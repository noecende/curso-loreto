<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nueva publicación</title>
</head>

<body>

    <div class="container">
        <div class="mx-auto col-8">
            <h1 class="display-4 mt-3 text-center">Nueva publicación</h1>
            <form>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Publica</label>
                    <textarea class="form-control" id="descripcion" name="descripcion"
                        placeholder="¿En qué estás pensando? ¡Cuéntanos!"></textarea>
                </div>
                <div class="mb-3 col-6">
                    <label for="image" class="form-label">Selecciona una imagen</label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>
