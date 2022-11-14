<?php
namespace ClasesTipo;
abstract class Atipo {

    private $error;

    public function validar($valor){ //devuelve true si el valor no es nulo ni está vacío + validaciones específicas de cada tipo.
        if ($valor == null || $valor == "" ) {
            $this->error = "El campo no puede estar vacío";
            return false;
        } else {
            return $this->validarEspecifico($valor); 
        }
    }

    //limpieza de carácteres especiales HTML para evitar cross-site scripting
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function imprimirError() {
        if ($this->error != null) {
            echo $this->error;
            return false; //Si hay errores devuelve un false!
        }
    }

    abstract public function validarEspecifico($valor); //A rellenar en la clase específica

    abstract public function pintar(); //Metodo para que cada clase pinte el input que le corresponde
    
}
?>