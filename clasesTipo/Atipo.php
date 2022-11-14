<?php
//namespace ClasesTipo;
abstract class Atipo {

    public function validar($valor){
        return ($valor != null || $valor != "") && //devuelve true si el valor no es nulo ni está vacío.
                $this->validarEspecifico($valor);
    }

    //limpieza de carácteres especiales HTML para evitar cross-site scripting
    function cleanData($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    abstract public function validarEspecifico($valor); //A rellenar en la clase específica

    abstract public function pintar(); //Metodo para que cada clase pinte el input que le corresponde
    function errorVacio() {
        echo "El campo no puede estar vacío.";
    }
}
?>