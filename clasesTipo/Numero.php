<?php
namespace clasesTipo;
class Numero extends Atipo {

    private const MIN_VALOR=0;
    private const MAX_VALOR=5;

    function validarEspecifico ($valor) {

        if ($valor>=self::MIN_VALOR && $valor<=self::MAX_VALOR): 
            return true;
        else: 
            $this->error="Fuera del rango permitido, debe estar entre 0 y 5 (ambos incluidos).";
            return false;
        endif;
    }

    function pintar() {
        echo "<label for='$this->name'>$this->name</label>";
        echo "<input type='range' name='$this->name' min='".self::MIN_VALOR."' max='".self::MAX_VALOR."' value='$this->valor'>";
        $this->imprimirError();
    }
}
?>