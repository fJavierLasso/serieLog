<?php
namespace clasesTipo;
class Numero extends Atipo {
    private $numero;
    protected $name;
    protected $error;
    private const MIN_VALOR=0;
    private const MAX_VALOR=5;

    public function __construct ($numero,$name) {
            $this->numero=$numero;
            $this->name=$name;
    }

    public function getValor() { return $this->numero; }
    public function setValor($numero) { $this->numero = $numero; }
    public function getNombre() { return $this->name; }
    public function setNombre($name) { $this->name = $name; }


    function validarEspecifico ($valor) {
        if ($valor>=self::MIN_VALOR && $valor<=self::MAX_VALOR): return true;
        else: 
            $this->error="Fuera del rango permitido, debe estar entre 0 y 5 (ambos incluídos).";
            return false;
        endif;
    }

    function pintar() {
        $input = '<br><label for="'.$this->name.'">¿Cuánto te gustó?</label><br>
        <input type="range" value="'.$this->numero.'" min="'.self::MIN_VALOR.'" max="'.self::MAX_VALOR.'" name="'.$this->name.'" id="'.$this->name.'"><br>';

        print($input);
    }
}
?>