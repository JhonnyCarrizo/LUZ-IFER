<?php
require_once('Operadora.php');
class Persona{
    protected $nacionalidad;
    protected $cedula;
    protected $nombres;
    protected $sexo;
    protected $arrOperadora=[];

    public function setNacionalidad($nacionalidad){
        $this->nacionalidad=$nacionalidad;
    }
    public function setCedula($cedula){
        $this->cedula=$cedula;
    }
    public function setNombres($nombres){
        $this->nombres=$nombres;
    }
    public function setSexo($sexo){
        $this->sexo=$sexo;
    }

    public function getNacionalidad(){
        return $this->nacionalidad;
    }
    public function getCedula(){
        return $this->cedula;
    }
    public function getNombres(){
        return $this->nombres;
    }
    public function getSexo(){
        return $this->sexo;
    }

    public function addOperadora(Operadora $operadora){
        $this->arrOperadora[]=$operadora;
    }
    public function mostrarDatos(){
        echo '<h3>Datos ingresados</h3><hr>';
        echo '<b>Cedula</b><br>';
        echo $this->nacionalidad.' '.$this->cedula.'<br>';
        echo '<b>Nombres</b><br>';
        echo $this->nombres.'<br>';
        echo '<b>Sexo</b><br>';
        echo $this->sexo.'<br>';
        echo '<b>Operadoras seleccionadas</b><br>';
        if(count($this->arrOperadora)==0){
            echo'ninguna operadora seleccionada';
        } else{
            echo "<ul>";
            for($i=0; $i < count($this->arrOperadora);$i++){
                echo"<li>".$this->arrOperadora[$i]->getNombre()."</li>";
            }
            echo"</ul>";
        }

    }
}
