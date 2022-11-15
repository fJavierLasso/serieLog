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
        $emision = isset($post['emision']);
        $diaEstreno = isset($post['diaEstreno']) ? $post['diaEstreno'] : null;
        $notificaciones = isset($post['notificaciones']);
        $valoracion = isset($post['valoracion']) ? $post['valoracion'] : null;
        $resena = isset($post['reseña']) ? $post['reseña'] : null;

        array_push($this->valores, new \clasesTipo\Texto($nombre, 25, "nombre"));
        // array_push($this->valores, new clasesTipo\TextoArray($genero, "genero"));
        // array_push($this->valores, new clasesTipo\TextoArray($plataforma, "plataforma"));
        array_push($this->valores, new \clasesTipo\Check("emision",$emision));
        // array_push($this->valores, new clasesTipo\TextoArray($diaEstreno, "diaEstreno"));
        array_push($this->valores, new \clasesTipo\Check("notificaciones",$notificaciones));
        array_push($this->valores, new \clasesTipo\Numero($valoracion, "valoracion"));
        array_push($this->valores, new \clasesTipo\Texto($resena, 500, "reseña"));
    }

    public function validarGlobal()
    {
        if (!empty($_POST)) { //valida sólo si se ha enviado mínimo un formulario. Si el post está empty, no valida nada.
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
            $valor->pintar();
        }
        echo "<input type='submit' value='Enviar'></form>";
    }

    public function guardar($post)
    {

        echo "voy a guardar:";
        print_r($post);
        echo "impreso desde el método Serie->guardar(), que aún no está escrito<hr>";
        // $file = 'bbdd.txt';
        // $content = '';

        // foreach ($post as $valor) {
        //     $content .= $valor->getValor() . " ";
        //     echo($valor->getValor() . "  " . $content);
        // }
        // file_put_contents($file, $content);
        // $content = json_decode(file_get_contents($file), TRUE);

    }



}


?>