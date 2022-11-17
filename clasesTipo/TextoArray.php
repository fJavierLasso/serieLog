<?php
namespace clasesTipo;
class TextoArray extends Atipo{
    private $atributos = array();
    private $select = false; //true para generar un select, false para generar checkboxes
    public function __construct($valor, $name, $atributos, $select){

        $this->valor=$valor;
        $this->name = $name;

        if ($select) {
            $this->select = true;
        }

        foreach ($atributos as $atributo) {
            array_push($this->atributos,$atributo);
        }
    }
    public function validarEspecifico($value){
        if(is_string($value))
        return (in_array($value, $this->atributos));
        else{
            $esValido = true;
            foreach ($value as $key => $value) {
                if(!(in_array($value, $this->atributos))) $esValido=false;
            }
            return $esValido;
        }
    }
    public function pintar(){

        if ($this->select) {
            //pinto un select con this atributos
            $this->pintarSelect($this->atributos);
        } else {
            //pinto checkboxes con this atributos
            $this->pintarCheckbox($this->atributos);
        }
        
    }
    public function pintarSelect($arr){
        print '<div>';
        print '<label for="'.$this->name.'"> '.$this->name.':</label>';
        print '<select id="'.$this->name.'" name="'.$this->name.'">';
        $selected ="";
            foreach ($arr as $key => $value) {
                ($this->valor==$value)?$selected="selected" : $selected = "";
               print '<option value="'.$value.'" '.$selected.'>'.$value.'</option>';        
            }
        print '</select>';
        print '</div>';
    }
    public function pintarCheckbox($arr){
        
        print '<div class="checkbox__"'.$this->name.'>';
                foreach ($arr as $key => $value) {
                    print '<label for="'.$this->name.'"><input type="checkbox" id="'.$this->name.'" name="'.$this->name.'[]" value="'.$value.'">'. $value .'</label>';
                }
                print '</div>';
    }
    public function getValor(){return $this->valor;}
    public function setValor($valor){$this->valor = $valor;return $this;}
}
?>