<?php
namespace clasesTipo;

abstract class Atipo
{
    private $error;
    private $name;
    private $valor;

    public function validar($valor = null)
    { //devuelve true si el valor no es nulo ni está vacío + validaciones específicas de cada tipo.
        if ($valor != "" && $valor != null) {
            return $this->validarEspecifico($valor);
        } else {
            $this->error = "El campo $this->name no puede estar vacío<br>"; //No está devolviendo this name.
            return false;
        }
    }

    public function getValor() { return $this->valor; }
    public function imprimirError()
    {
        if ($this->error != null) {
            echo "<div class='error'>$this->error</div>";
            return false; //Si hay errores devuelve un false!
        };
    }

    public function __construct($valor, $name) {
        $this->valor = $valor;
        $this->name = $name;
    }

    abstract public function pintar();

    abstract public function validarEspecifico($valor); //A rellenar en la clase específica
}
?>