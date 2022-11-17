<?php
namespace clasesTipo;

class Texto extends Atipo
{
    private $longitud;
    //constantes públicas para poder utilizarse fuera
    public const LONG_NOMBRE = 25;
    public const LONG_DESCRIPCION = 500;
    public const LIMITE_LONG_TEXTAREA = 80; //limite para input tipo texto, desde estos chars es textarea

    //constructor (se valida en serie)
    public function __construct($valor, $longitud, $name)
    {
        $this->valor = $valor;
        $this->longitud = $longitud;
        $this->name = $name;
    }

    //getters y setters
    public function getValor()
    {
        return $this->valor;
    }

    //métodos
    function validarEspecifico($cadena)
    {
        // la cadena solamente puede contener letras (minus y mayus), números, espacios en blanco, puntos, comas, interrogaciones, exclamaciones, barras bajas y guiones
        //mínimo 1 carácter, max $this->longitud
        // ^ comienzo del string
        // $ final del string
        $pattern = "/^[a-zA-Z0-9\s\,\.\¿\?\¡\!\_\-]{1," . $this->longitud . "}$/";

        //si el patrón coincide todo oki, si no, un echo con un error.
        //a la cadena le metemos cleanData para evitar cross-site scripting
        if (preg_match($pattern, $this->cleanData($cadena)))
            return true;
        else {
            $this->error = "No se admiten carácteres especiales y el tamaño máximo es de $this->longitud caracteres<br>";
            return false;
        }
    }

    function pintar()
    {
        //si supera LIMITE_LONG_TEXTAREA (80 chars) pinta un textarea, si no, un input tipo texto
        if ($this->longitud >= self::LIMITE_LONG_TEXTAREA) {
            echo "<label for='" . $this->name . "'>" . $this->name . "</label>";
            echo "<br>";
            echo "<textarea id='" . $this->name . "' name='" . $this->name . "' placeholder='Me pareció...' rows='10' cols='50'>" . $this->valor . "</textarea>";
        } else {
            echo "<label for='" . $this->name . "'>" . $this->name . "</label>";
            echo "<br>";
            echo "<input type='text' id='" . $this->name . "' name='" . $this->name . "' placeholder='Serie...' value='" . $this->valor . "'>";
        }
        echo "<br>";
    }



    //limpieza de carácteres especiales HTML para evitar cross-site scripting
    function cleanData($data)
    {
        if (is_string($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } else {
            return $data;
        }
    }

}

?>