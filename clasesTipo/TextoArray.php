<?php
namespace clasesTipo;
class TextoArray extends Atipo{

    protected $valor;
    protected $name;
    protected $error;
    protected $atributos = array();
    protected $select = false;
    private const DIAS = [
        "L",
        "M",
        "X",
        "J",
        "V",
        "S",
        "D"
    ];
    private const PLATAFORMAS = [
        "Netflix",
        "Amazon Prime",
        "HBO",
        "Disney+",
        "Otros"
    ];
    private const GENEROS = [
        "Comedia",
        "Terror",
        "Historico",
        "Romantico",
        "Escolar",
        "Misterio",
        "Suspense",
        "Fantasia"
    ];
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
       
        return (in_array($value, $this->atributos));

       
       
        // if(is_array($value)){
        //     if(empty(array_diff(self::GENEROS, $value))){
        //         $this->error = "La opción seleccionada no existe";
        //         return false;
        //     }else{
        //         $this->valor = $value;
        //         return true;
        //     }
        // }
        // else{
        //     if (!(in_array($value, self::DIAS)) && !(in_array($value, self::PLATAFORMAS)) ){
        //         $this->error="La opción seleccionada no existe";
        //         return false;
        //         }else {
        //             $this->valor = $value;
        //             return true;       
        //         }
        //     }
    }
    public function pintar(){

        if ($this->select) {
            //pinto un select con this atributos
        } else {
            //pinto checkboxes con this atributos
        }


        // switch ( strtoupper($this->name)) {
        //     case 'GENEROS':
        //         print '<div class="checkbox__generos">';
        //         foreach (self::GENEROS as $key => $value) {
                    
        //             print '<label for="'.$this->name.'"><input type="checkbox" id="'.$this->name.'" name="generos[]" value="'.$value.'">'. $value .'</label>';
        //         }
        //         print '</div>';
        //         break;
        //     case 'PLATAFORMAS':
        //         $this->pintarDataList(self::PLATAFORMAS);break;
        //     case 'DIAS':
        //         $this->pintarDataList(self::DIAS);break;            
        //     default:break;
        // }
    }
    public function pintarDataList($arr){
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
    public function getValor(){return $this->valor;}
    public function setValor($valor){$this->valor = $valor;return $this;}
}
?>