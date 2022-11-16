<?php

//autoload for folders clasesPadre and clasesTipo
spl_autoload_register(function ($class) {

    $classPath = realpath("./");
    $file = str_replace('\\','/', $class);
    $include = "$classPath/${file}.php";
    require($include);

});

echo "Valores añadidos al post: ";
echo "<pre>";
print_r($_POST); //hecho para debugging. Borrar cuando se termine todo.
echo "</pre>";

echo ("<hr>"); //hecho para debugging. Borrar cuando se termine todo.

// $serie = new \clasesTipo\TextoArray($_POST['generos'], "generos");

$serie1 = new \clasesTipo\TextoArray($_POST['plataformas'], "plataformas");
// $serie2 = new \clasesTipo\TextoArray($_POST['dias'], "dias");

// if ($serie->validar($_POST['generos'])) {
//     echo "esta ok \n";
// }else {
//     $serie->imprimirError();
// }
if ($serie1->validar($_POST['plataformas'])) {

    print "esta ok \n";
}else {
    $serie1->imprimirError();
}

// if ($serie2->validar($_POST['dias'])) {
    
//     print "esta ok \n";
// }else {
//     $serie2->imprimirError();
// }
print_r ($_POST);

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
    <form action="" method="post">

    <?php
    $serie1->pintar();
    ?> 

<input type="submit" value="enviar">
    </form>
</body>
</html>