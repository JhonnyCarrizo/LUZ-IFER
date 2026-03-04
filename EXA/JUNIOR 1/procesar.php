<?php
require_once('clases/Operadora.php');
require_once('clases/Persona.php');
if (isset($_POST['guardar'])){
    $persona=new Persona();
    $persona->setNacionalidad($_POST['nacionalidad']);
    $persona->setCedula($_POST['cedula']);
    $persona->setNombres($_POST['nombres']);
    $persona->setSexo($_POST['sexo']);
    if(isset($_POST['arrOperadora'])){
        for($i = 0;$i < count($_POST['arrOperadora']);$i++){
            $persona->addOperadora(new Operadora($_POST['arrOperadora'][$i]));
        }
    }
    $persona->mostrarDatos();
    echo'<a href="index.php">volver</a>';
}
