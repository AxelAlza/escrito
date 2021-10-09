<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <h1>Souvenirs</h1>
    <nav> 
        <a href="/">Comprar |</a>
        <a href="/abm"> ABM |</a>
        <a href="/ventas"> Ventas|</a>
        <a href="/logout"> Logout</a>

    </nav>
    <table>
        <thead>
            <th>id</th>
            <th>nombre</th>
            <th>descripcion</th>
            <th>stock</th>
            <th>precio</th>
            <th>fecha alta</th>
            <th>acciones</th>
        </thead>
        <tbody id="tabla">
            <?php echo $parametros?>
        </tbody>
    </table>
</body>
</html>