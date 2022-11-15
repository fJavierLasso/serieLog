<?php
namespace clasesTipo;

class Check extends Atipo {
    
        protected $valor = true; //true o false
        protected $name; //para el label
    
        public function __construct($name, $valor) {
            $this->valor = $valor;
            $this->name = $name;
        }
    
        public function validarEspecifico($valor) {
            return ($valor == true || $valor == false);
        }
    
        public function pintar() {
            echo "<label for='$this->name'>$this->name</label>";
            echo "<input type='checkbox' name='$this->name' value='$this->valor'>";
            echo "<br>";
        }

        public function getValor() {
            return $this->valor;
        }
    
    
}
?>