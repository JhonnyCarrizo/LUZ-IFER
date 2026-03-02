<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/registro.css">
    <link rel="icon" href="img/logo.png">
    <title>Registro</title>
</head>
<body>
    <form action="procesar.php" method="post" onsubmit="return enviar()" autocomplete="off">
        <div id="boxTitulo"><h1>Régistro de herramientas</h1></div>
        <div id="boxLeft">
            <div id="boxTools">
                <label for="tools" class="left">Herramientas</label>
                <input type="text" name="tools" id="tools" class="left">
            </div>
            <div id="boxSerie" >
                <label for="serie" class="left">Serie</label>
                <input type="text" name="serie" id="serie" class="left">
            </div>
            <div id="boxMarca" >
                <label for="marca" class="left">Marca</label>
                <input type="text" name="marca" id="marca" class="left">
            </div>
        </div>
        <div id="boxMedium">
            <label for="estado" class="medium">Diagnóstico de Estado</label>
            <textarea name="estado" id="estado" class="medium"></textarea>
        </div>
        <div id="boxRight">
            <label class="right" for="arrCondicion">Condición Operativa</label><br>
            <label for="arrCondicion"><input type="radio" id="100" name="arrCondicion" value="Optimo"> Óptimo (100%) </label><br>
            <label for="arrCondicion"><input type="radio" id="75" name="arrCondicion" value="Operativo"> Operativo (75%) </label><br>
            <label for="arrCondicion"><input type="radio" id="50" name="arrCondicion" value="Revision"> Requiere Revisión (50%) </label><br>
            <label for="arrCondicion"><input type="radio" id="25" name="arrCondicion" value="Critico"> Crítico / En reparación (25%) </label><br>
        </div>
        <div id="boxEntrar"><input type="submit" name="guardar" value="Envíar"></div>
    </form>
    <script src="assets/javascript/registro.js"></script>
</body>
</html>