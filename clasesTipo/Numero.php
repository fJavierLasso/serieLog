<?php
namespace clasesTipo;
class Numero extends Atipo {
    private $numero;
    private $nombre;
    protected $error;
    private const MIN_VALOR=0;
    private const MAX_VALOR=5;

    public function __construct ($numero,$nombre) {
            $this->numero=$numero;
            $this->nombre=$nombre;
    }

    public function getValor() { return $this->numero; }
    public function setValor($numero) { $this->numero = $numero; }
    public function getNombre() { return $this->nombre; }
    public function setNombre($nombre) { $this->nombre = $nombre; }


    function validarEspecifico ($valor) {
        $this->cleanData($valor);
        if ($valor>=self::MIN_VALOR && $valor<=self::MAX_VALOR): return true;
        else: 
            $this->error="Fuera del rango permitido, debe estar entre 0 y 5 (ambos incluídos).";
            return false;
        endif;
    }

    function pintar() {
        $input = '<label for="'.$this->nombre.'">¿Del '.self::MIN_VALOR.' al '.self::MAX_VALOR.' que nota le das?</label>
        <input type="range" value="'.$_POST[$this->nombre].'" min="'.self::MIN_VALOR.'" max="'.self::MAX_VALOR.'" name="'.$this->nombre.'" id="'.$this->nombre.'">';

        print($input);
    }
}
?>