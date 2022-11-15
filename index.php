<?php

//autoload for folders clasesPadre and clasesTipo
spl_autoload_register(function ($class) {

    $classPath = realpath("./");
    $file = str_replace('\\','/', $class);
    $include = "$classPath/${file}.php";
    require($include);

});

echo "Valores añadidos al post: ";
print_r($_POST); //hecho para debugging. Borrar cuando se termine todo.
echo ("<hr>"); //hecho para debugging. Borrar cuando se termine todo.

$serie = new clasesPadre\Serie($_POST);

if ($serie->validarGlobal()) {
    $serie->guardar($_POST); //hacer guardar; que guarde los valores en un archivo de texto.
    //meter header a tablaSeries cuando esté hecha.
} 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SerieLog</title>
</head>

    <h1>Introduce los datos de tu serie</h1>

    <?php
    $serie->pintarGlobal();
    ?> 

</body>
</html>