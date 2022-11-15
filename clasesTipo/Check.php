<?php
namespace clasesTipo;

class Check extends Atipo {
    
        private $valor; //true o false
        private $nombre; //para el label
    
        public function __construct($nombre, $valor = false) {
            $this->valor = $valor;
            $this->nombre = $nombre;
        }
    
        public function validarEspecifico($valor) {
            return true;
        }
    
        public function pintar() {
            echo "<label for='$this->nombre'>$this->nombre</label>";
            echo "<input type='checkbox' name='$this->nombre' value='$this->valor'>";
        }
    
    
}
?>