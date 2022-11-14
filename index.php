<?php 
// use ClasesTipo\Texto;
    require('./clasesTipo/Atipo.php');
    require('./Texto.php');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $prueba = new Texto("", Texto::LONG_NOMBRE, "nombre");
        $prueba->pintar();
        $prueba2 = new Texto("", Texto::LONG_DESCRIPCION, "descripcion");
        $prueba2->pintar();
    ?>
</body>
</html>