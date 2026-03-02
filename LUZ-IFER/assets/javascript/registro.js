function enviar() {
    let toolsInput = document.getElementById("tools").value;
    let tools = toolsInput.trim();
    let serieInput = document.getElementById("serie").value;
    let serie = serieInput.trim();
    let marcaInput = document.getElementById("marca").value;
    let marca = marcaInput.trim();
    let estadoInput = document.getElementById("estado").value;
    let estado = estadoInput.trim();
    const condicion = document.querySelector('input[name="arrCondicion"]:checked');

    if (toolsInput === "") {
        alert("Ingrese el nombre de la Herramienta que quieras guardar");
        return false;
    }

    if (toolsInput !== tools) {
        alert("No se permiten espacios al principio ni al final");
        return false;  
    }

    if (serieInput === "") {
        alert("Ingrese el serial de la Herramienta que quieras guardar");
        return false;
    }

    if (serieInput !== serie) {
        alert("No se permiten espacios al principio ni al final");
        return false;  
    }

    if (marcaInput === "") {
        alert("Ingrese la marca de la Herramienta que quieras guardar");
        return false;
    }

    if (marcaInput !== marca) {
        alert("No se permiten espacios al principio ni al final");
        return false;  
    }

    if (estadoInput === "") {
        alert("Escriba una descripción del estado en el que se encuentra la herramienta");
        return false;
    }

    if (estadoInput !== estado) {
        alert("No se permiten espacios al principio ni al final");
        return false;  
    }

    if (!condicion) {
        alert("Seleccione un porcentaje respecto a la condicion operativa de la herramienta");
        return false; 
    }

    return true;
}