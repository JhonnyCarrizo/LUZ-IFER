
<?php
    require_once('class/Rol.php');
    require_once('class/Persona.php');
    $busRoles = Rol::buscarTodo();
    $busPersona = Persona::buscarTodo();
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
    <form method="post" action="procesar.php" onsubmit="return enviar()">
        <label>Cédula</label><br>
        <input type="text" name="cedula" id="cedula"><br>
        <label>Apellidos</label><br>
        <input type="text" name="apellidos" id="apellidos"><br>
        <label>Nombres</label><br>
        <input type="text" name="nombres" id="nombres"><br>
        <label>Usuario</label><br>
        <input type="text" name="user" id="user"><br>
        <label>Roles</label><br>
        <?php

            while ($dataRol = $busRoles->fetch_array()) {
                echo 
                '
                    <label>
                    <input type="checkbox" name="roles[]" value="'.$dataRol['id'].'">
                ';
                echo $dataRol['rol'];
                echo '</label><br>';
            }
        ?>
        <br>
        <button type="submit" name="boton" >Enviar</button>
    </form>

    <br>

    <h3>Registros</h3>
    <hr>
    <?php
        if($busPersona->num_rows == 0)  {
            echo 'No existen registros en la base de datos';
        } else {
            echo '<table border=1 >';
            echo '<tr>';
            echo '
            <td>Cédulas</td>
            <td>Apellidos</td>
            <td>Nombres</td>
            <td>users</td>
            <td>roles</td>';
             echo '</tr>';
            while($data = $busPersona->fetch_array()) {
                echo '<tr>';
                    echo '
                    <td>'.$data['cedula'].'</td>
                    <td>'.$data['apellidos'].'</td>
                    <td>'.$data['nombres'].'</td>
                    <td>'.$data['user'].'</td>
                    <td>'.$data['rol'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
        }
    ?>
    <script src="assets/js/app.js"></script>
</body>
</html>