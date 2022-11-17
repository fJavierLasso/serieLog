<?php
namespace clasesTipo;

class Seleccion extends Atipo
{
    private $atributos = array();
    private $opcionExclusiva; //true para generar un select, false para generar checkboxes
    public function __construct($valor, $name, $opcionExclusiva, $atributos)
    {
        parent::__construct($valor,$name);
        $this->opcionExclusiva = $opcionExclusiva;
        foreach ($atributos as $atributo){
            array_push($this->atributos, $atributo);
        }
        }
    public function validarEspecifico($value)
    {
        if (is_string($value))
            return (in_array($value, $this->atributos));
        else {
            $esValido = true;
            foreach ($value as $value) {
                if (!(in_array($value, $this->atributos)))
                    $esValido = false;
            }
            return $esValido;
        }
    }
    public function pintar()
    {
        if ($this->opcionExclusiva) {
            $this->pintarSelect($this->atributos);
        } else {
            $this->pintarCheckbox($this->atributos);
        }
        $this->imprimirError();
    }
    public function pintarSelect($arr)
    {
        print '<div>';
        print '<label for="' . $this->getName() . '"> ' . $this->getName() . ':</label>';
        print '<select id="' . $this->getName() . '" name="' . $this->getName() . '">';
        $selected = "";
        foreach ($arr as $value) {
            ($this->valor == $value) ? $selected = "selected" : $selected = "";
            print '<option value="' . $value . '" ' . $selected . '>' . $value . '</option>';
        }
        print '</select>';
        print '</div>';
    }
    public function pintarCheckbox($arr)
    {
        print '<div class="checkbox__"' . $this->getName() . '>';
        foreach ($arr as $value) {
            print '<label for="' . $value . '"><input type="checkbox" id="' .$value . '" name="' . $value . '[]" value="' .$value . '">' . $value. '</label>';
        }
        print '</div>';
    }
}
?>