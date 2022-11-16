<?php
namespace clasesPadre;


class Serie
{

    private $valores = array();
    private $esValida = true;

    public function __construct($post)
    {
        $nombre = isset($post['nombre']) ? $post['nombre'] : null;
        $genero = isset($post['genero']) ? $post['genero'] : null;
        $plataforma = isset($post['plataforma']) ? $post['plataforma'] : null;
        $emision = isset($post['emision']) ? 'Si':'No';
        $diaEstreno = isset($post['diaEstreno']) ? $post['diaEstreno'] : null;
        $notificaciones = isset($post['notificaciones']) ? 'Si':'No';;
        $valoracion = isset($post['valoracion']) ? $post['valoracion'] : null;
        $resena = isset($post['reseña']) ? $post['reseña'] : null;

        array_push($this->valores, new \clasesTipo\Texto($nombre, 25, "nombre"));
        //array_push($this->valores, new \clasesTipo\TextoArray($genero, "generos"));
        //array_push($this->valores, new \clasesTipo\TextoArray($plataforma, "plataformas"));
        //array_push($this->valores, new \clasesTipo\TextoArray($diaEstreno, "dias"));
        array_push($this->valores, new \clasesTipo\Numero($valoracion, "valoracion"));
        array_push($this->valores, new \clasesTipo\Texto($resena, 500, "reseña"));
        array_push($this->valores, new \clasesTipo\Check("emision", $emision));
    }

    public function validarGlobal()
    {
        if (isset($_POST['valoracion'])) { //valida sólo si se ha enviado mínimo un formulario. Si el post está empty, no valida nada.
            $val = true;
            foreach ($this->valores as $valor) {
                if (!$valor->validar($valor->getValor())) {
                    $valor->imprimirError();
                    $val = false;
                }
            }
            return $val;
        }
    }

    public function pintarGlobal()
    {
        echo "<form action='index.php' method='post'>";
        foreach ($this->valores as $valor) {
            echo "<div class='elemento'>";
            $valor->pintar();
            echo "</div>";
        }
        echo "<input type='submit' value='Enviar' class='btn btn-primary'></form>";
    }

    public function guardar($post)
    {

        if (!isset($post['emision'])) {$post['emision'] = 'off';}else{$_POST['emision'] = 'on';};

        $file = 'bbdd.txt';
        // Open the file to get existing content
        $current = file_get_contents($file);
        // Append a new series to the file
        $current .= "<tr>";
        foreach ($post as $key => $value) {
                $current .= "<td>" . $value . "</td>\n";
        }

        $current .= "</tr>";
        // Write the contents back to the file
        file_put_contents($file, $current);

    }



}


?>