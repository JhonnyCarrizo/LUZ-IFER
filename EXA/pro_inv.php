<?php
    require_once('clase/regis_herra.php');
    require_once('clase/condicion.php');
    $h = new Herramienta ();

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