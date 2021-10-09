<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
</head>
<h1>Nuevo Souvenir</h1>
<body>
<nav> 
        <a href="/">Comprar |</a>
        <a href="/abm"> ABM |</a>
        <a href="/ventas"> Ventas|</a>
        <a href="/logout"> Logout</a>

    </nav>
    <form method="POST">
    <label for="nombre"> nombre </label>
    <input type="text" name ="nombre" id ="nombre">
    <br>
    <label for="descripcion"> descripcion</label>
    <input type="text" name="descripcion" id="pass">
    <br>
    <label for="stock"> stock </label>
    <input type="number" name ="stock" id ="stock">
    <br>
    <label for="precio"> precio</label>
    <input type="number" name="precio" id="precio">
    <br>
    <button type="submit">Añadir</button>
    </form>
</body>
</html>
