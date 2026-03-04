
<?php

    require_once('class/Rol.php');
    require_once('class/Persona.php');
    $busRoles = Rol::buscarTodo();
    $busPersona = Persona::buscarTodo();
    $cedula = '';
    $nombres = '';
    $apellidos = '';
    $user = '';
    $method = 'POST';
    if (isset($_GET['accion']) && $_GET['accion'] == 'cargarRegistro') {
        $method = 'GET';
        $data = Persona::findById($_GET['personaId']);
        $cedula = $data['cedula'];
        $nombres = $data['nombres'];
        $apellidos = $data['apellidos'];
        $user = $data['user'];
        $rolesAsignados = $data['roles'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/app.css">
</head>

<body>
    <form method="<?php echo $method?>" action="procesar.php" onsubmit="return enviar()">
        <?php 
            if (isset($_GET['personaId'])) {
                echo '<input type="hidden" name="personaId" value='.$_GET['personaId'].' >';
            }
        ?>
        <label>Cédula</label><br>
        <input type="text" name="cedula" id="cedula" value="<?php echo $cedula?>"><br>
        <label>Apellidos</label><br>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos?>"><br>
        <label>Nombres</label><br>
        <input type="text" name="nombres" id="nombres" value="<?php echo $nombres?>"><br>
        <label>Usuario</label><br>
        <input type="text" name="user" id="user" value="<?php echo $user?>"><br>
        <label>Roles</label><br>
        <?php

            while ($dataRol = $busRoles->fetch_array()) {
                $checked = '';
                if(isset($rolesAsignados)) {
                    foreach ($rolesAsignados as $key => $dataRolAsignado) {
                        if($dataRol['id'] == $dataRolAsignado['rolId']) {
                            $checked = 'checked';
                            break;
                        }
                    }
                }
                echo 
                '
                    <label>
                    <input type="checkbox" name="roles[]" value="'.$dataRol['id'].'"  '. $checked.'>
                ';
                echo $dataRol['rol'];
                echo '</label><br>';
            }
        ?>
        <br>
        <button type="submit" name="boton" >Enviar</button>
        <a href='index.php'>Reiniciar</a>
    </form>

    <br>

    <h3>Registros</h3>
    <hr>
    <?php

        if(count($busPersona) == 0)  {
            echo 'No existen registros en la base de datos';
        } else {
            echo '<table border=1 >';
            echo '<tr>';
            echo '
            <td>Cédulas</td>
            <td>Apellidos</td>
            <td>Nombres</td>
            <td>users</td>
            <td>roles</td>
            <td>Acciones</td>';
             echo '</tr>';
            foreach ($busPersona as $key => $data) {
                echo '<tr>';
                    echo '
                    <td>'.$data['cedula'].'</td>
                    <td>'.$data['apellidos'].'</td>
                    <td>'.$data['nombres'].'</td>
                    <td>'.$data['user'].'</td>
                    <td>';
                    echo '<ul>';
                    foreach ($data['roles'] as $key => $rol) {
                        echo '<li>'.$rol['rol'].'</li>';
                    }
                    echo '</ul>';
                    echo '</td>
                    <td><a href="index.php?accion=cargarRegistro&personaId='.$data['personaId'].'">Editar</a></td>';

                echo '</tr>';
            }
            echo '</table>';
        }
    ?>
    <script src="assets/js/app.js"></script>
</body>
</html>