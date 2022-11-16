<?php
namespace clasesTipo;

class Check extends Atipo {
    
        protected $valor = "no";
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
            if (isset($_POST[$this->name])) {
                echo "<input type='checkbox' name='$this->name' value='Si' checked>";
            } else {
                echo "<input type='checkbox' name='$this->name' value='Si'>";
            }  
        }

        public function getValor() {
            return $this->valor;
        }
    
    
}
?>