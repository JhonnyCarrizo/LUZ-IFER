<?php

    require_once('clase/regis_herra.php');
    require_once('clase/condicion.php');
    $busCondiciones = Condicion::buscarTodo();
    $busHerramienta= Herramienta::buscarTodo();
    $tools = '';
    $serie = '';
    $marca = '';
    $estado = '';
    $method = 'POST';
    // if (isset($_GET['accion']) && $_GET['accion'] == 'cargarRegistro') {
    //     $method = 'GET';
    //     $data = Herramienta::findById($_GET['personaId']);
    //     $tools = $data['tools'];
    //     $serie = $data['serie'];
    //     $marca = $data['marca'];
    //     $estado = $data['estado'];
    //     $condicionesAsignados = $data['condiciones'];
    // }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="stylesheet" href="assets/css/inventario.css">
    <link rel="icon" href="img/logo.png" >
</head>

<body>

<div id="boxPadre">
        <div id="boxTitulo" ><h1>Búscador de herramientas</h1></div>
    <form method="POST" action="pro_herr.php" onsubmit="return enviar()">
    <?php
        if($busHerramienta->num_rows == 0)  {
            echo 'No existen registros en la base de datos';
        } else {
            echo '<div id="boxTabla" >';
            echo '<table>';
            echo '<tr>';
            echo '
            <th> Opciones </th>
            <th>Herramienta</th>
            <th>Serie</th>
            <th>Marca</th>
            <th>Diagnóstico de Estado</th>
            <th>Condición Operativa</th>';
            
             echo '</tr>';
            while($data = $busHerramienta->fetch_array()) {
                echo '<tr>';
                    echo '
                    <td> <a href="registro.php">Editar</a> <br> <a href="registro.php">Eliminar</a> </td>
                    <td>'.$data['tools'].'</td>
                    <td>'.$data['serie'].'</td>
                    <td>'.$data['marca'].'</td>
                    <td id="estado">'.$data['estado'].'</td>
                    <td>'.$data['condicion'].'</td>';
                echo '</tr>';
            }
            echo '</table>';
            '</div>';
        }
    ?>
</div>
</body>
</html>