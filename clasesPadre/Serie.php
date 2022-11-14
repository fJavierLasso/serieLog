<?php

class Serie
{

    private $valores = array();
    private $esValida = true;

    public function __construct($post)
    {
        array_push($this->valores, new ClasesTipo\Texto($post[0], 25, "nombre"));
        array_push($this->valores, new ClasesTipo\TextoArray($post[1], "genero"));
        array_push($this->valores, new ClasesTipo\TextoArray($post[2], "plataforma"));
        array_push($this->valores, new ClasesTipo\Estado($post[3], "emision"));
        array_push($this->valores, new ClasesTipo\TextoArray($post[4], "diaEstreno"));
        array_push($this->valores, new ClasesTipo\Estado($post[5], "notificaciones"));
        array_push($this->valores, new ClasesTipo\Numero($post[6], "valoracion"));
        array_push($this->valores, new ClasesTipo\Texto($post[7], 500, "resena"));
    }

    public function validarGlobal()
    {
        if (!empty($_POST)) { //valida sólo si se ha enviado mínimo un formulario. Si el post está empty, no valida nada.
            foreach ($this->valores as $valor) {
                if (!$valor->validar()) {
                    $valor->imprimirError();
                    $this->esValida = false;
                } else {
                    $this->guardar();
                }
            }

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

    public function guardar()
    {
        $file = 'bbdd.txt';
        $content = json_encode($my_variable);
        file_put_contents($file, $content);
        $content = json_decode(file_get_contents($file), TRUE);

    }


}


?>