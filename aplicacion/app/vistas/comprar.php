<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar</title>
</head>
<h1>Comprar</h1>

<body>
    <nav>
        <a href="/">Comprar |</a>
        <a href="/abm"> ABM |</a>
        <a href="/ventas"> Ventas|</a>
        <a href="/logout"> Logout</a>

    </nav>
    <form method="POST">

        <label for="nombre"> Nombre </label>
        <input type="text" id='nombre' name='nombre' readonly value="<?= $parametros['nombre']?>">
        <br>
        <label for="id"> id </label>
        <input type="number" id='id' name='id' readonly value="<?= $parametros['id'] ?>">
        <br>
        <label for="stock">stock</label>
        <input type="number" id="stock" readonly name="stock" value="<?= $parametros['stock'] ?>">
        <br>
        <label for="cantidad"> cantidad </label>
        <input type="number" name="cantidad" id="cantidad">
        <button type="submit">COMPRAR!!!</button>
    </form>
</body>

</html>