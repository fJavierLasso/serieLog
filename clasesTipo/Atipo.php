<?php
namespace clasesTipo;
abstract class Atipo {

    protected $error;
    protected $name;
    protected $valor;

    public function validar($valor = null){ //devuelve true si el valor no es nulo ni está vacío + validaciones específicas de cada tipo.
        if ($valor != "" && $valor != null) {
            return $this->validarEspecifico($valor);
        } else {
            $this->error = "El campo $this->name no puede estar vacío<br>";
            return false;
    }
}


    function imprimirError() {
        if ($this->error != null) {
            echo "<div class='error'>$this->error</div>";
            return false; //Si hay errores devuelve un false!
        }
    }

    abstract public function validarEspecifico($valor); //A rellenar en la clase específica

    abstract public function pintar(); //Metodo para que cada clase pinte el input que le corresponde
    
}
?>