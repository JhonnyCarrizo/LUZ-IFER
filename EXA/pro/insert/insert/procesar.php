<?php
    require_once('class/Persona.php');
    require_once('class/Rol.php');
    $persona = new Persona();

    if (isset($_POST['boton'])) {
        $persona->setCedula($_POST['cedula']);
        $persona->setApellidos($_POST['apellidos']);
        $persona->setNombres($_POST['nombres']);
        $persona->setUser($_POST['user']);
        foreach ($_POST['roles'] as $key => $rolId) {
            $persona->addRolId($rolId);
        }
        $persona->guardar();
        echo 'proceso completado. <a href="index.php">Volver</a>';

    }

?>