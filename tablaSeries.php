<!-- Aquí imprimiremos los valores de bbdd.txt en una tabla.
También tendremos un botón para volver a la página de series.

Si nos sobra tiempo, añadiremos botones para eliminar series de esta lista.
Y la función de que te avise si hay capítulo de serie el día de la semana.-->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Series</title>
</head>
<body>
<a href="index.php">Introducir otra serie</a>
<hr>
<table>
    <?php
    $file = 'bbdd.txt';
    $current = file_get_contents($file);
    echo $current;
    ?>
</table>




    
</body>
</html>
