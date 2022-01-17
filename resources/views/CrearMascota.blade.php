<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Mascota</title>
</head>
<body>
    <!--Dentro de la sintaxis puede ir cualquier expresión de php -->
    <h1>{{$titulo}}</h1> 
    <form action="/mascotas" method="post">
        <input name="nombre" type="text">
        <input name="especie" type="text">
        <input name="edad" type="text">
        <input name="fecha" type="date">
        <input type="submit" text="Enviar">
    </form>
    <div>{{$errors}}</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>