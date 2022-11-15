<?php

//autoload for folders clasesPadre and clasesTipo
spl_autoload_register(function ($class) {

    $classPath = realpath("./");
    $file = str_replace('\\','/', $class);
    $include = "$classPath/${file}.php";
    echo $include . "<hr>";
    require($include);

});


$serie = new clasesPadre\Serie($_POST);
$serie->validarGlobal();

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