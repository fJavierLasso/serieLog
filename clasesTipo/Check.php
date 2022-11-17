<?php
namespace clasesTipo;

class Check extends Atipo {
    
        public function validarEspecifico($valor) {
            return ($valor == true || $valor == false);
        }
    
        public function pintar() {
            echo "<label for='$this->name'>$this->name</label>";
            if (isset($_POST[$this->name])) {
                echo "<input type='checkbox' name='$this->name' checked>";
            } else {
                echo "<input type='checkbox' name='$this->name'>";
            }  
            $this->imprimirError();
        }
    
}
?>