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
    if (isset($_GET['boton'])) {   
        $persona->setId($_GET['personaId']);
        $persona->setCedula($_GET['cedula']);
        $persona->setApellidos($_GET['apellidos']);
        $persona->setNombres($_GET['nombres']);
        $persona->setUser($_GET['user']);
        foreach ($_GET['roles'] as $key => $rolId) {
            $persona->addRolId($rolId);
        }
        $persona->editar();
        echo 'proceso completado. <a href="index.php">Volver</a>';
    }
?>