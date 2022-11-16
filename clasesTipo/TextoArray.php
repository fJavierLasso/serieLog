<?php
namespace clasesTipo;
class TextoArray extends Atipo{

    protected $valor;
    protected $nombre;
    protected $error;
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
    public function __construct($valor, $nombre){
        $this->valor=$valor;
        $this->nombre = $nombre;
    }
    public function validarEspecifico($value=null){
        if(is_array($value)){
            if(empty(array_diff(self::GENEROS, $value))){
                $this->error = "La opción seleccionada no existe";
                return false;
            }else{
                $this->valor = $value;
                return true;
            }
        }
        else{
            if (!(in_array($value, self::DIAS)) && !(in_array($value, self::PLATAFORMAS)) ){
                $this->error="La opción seleccionada no existe";
                return false;
                }else {
                    $this->valor = $value;
                    return true;       
                }
            }
    }
    public function pintar(){
        switch ( strtoupper($this->nombre)) {
            case 'GENEROS':
                print '<div class="checkbox__generos">';
                foreach (self::GENEROS as $key => $value) {
                    
                    print '<label for="'.$this->nombre.'"><input type="checkbox" id="'.$this->nombre.'" name="generos[]" value="'.$value.'">'. $value .'</label>';
                }
                print '</div>';
                break;
            case 'PLATAFORMAS':
                $this->pintarDataList(self::PLATAFORMAS);break;
            case 'DIAS':
                $this->pintarDataList(self::DIAS);break;            
            default:break;
        }
    }
    public function pintarDataList($arr){
        print '<div>';
        print '<label for="'.$this->nombre.'"> '.$this->nombre.':</label>';
        print '<select id="'.$this->nombre.'" name="'.$this->nombre.'">';
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