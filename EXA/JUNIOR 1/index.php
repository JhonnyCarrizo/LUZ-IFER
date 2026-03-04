<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trabajo1</title>
    <link rel="stylesheet" href="http://localhost/TRABAJO1/assets/css/aex.css">
</head> 
<body>
    <form method="POST" action="procesar.php" onsubmit="return enviar ()">
        <label class="label">nacionalidad</label><br>
        <select name="nacionalidad">
            <option value="v">venezolano</option>
            <option value="e">extranjero</option>
        </select><br>
        <label>Cedula</label><br>
        <input type="text" id="cedula" name="cedula"><br>
        <label>Nombres</label><br>
        <input type="text" id="nombres" name="nombres"><br>
        <label>Sexo</label><br>
        <label>Femenino <input type="radio" name="sexo" value="femenino" checked> </label>
        <label>Masculino<input type="radio" name="sexo" value="masculino" > </label><br>
        <label>Operadoras de preferencia</label><br>
        <label>Movistar <input type="checkbox" name="arrOperadora[]" value="movistar"></label>
        <label>Digitel <input type="checkbox" name="arrOperadora[]" value="digitel"></label>
        <label>movilnet <input type="checkbox" name="arrOperadora[]" value="movilnet"></label><br>
        <button type="submit" name="guardar" id="button">guardar</button>
    </form> 
    <script src="http://localhost/TRABAJO1/assets/javascript/aex.js">
    </script>
</body>
</html>