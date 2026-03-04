const erCedula = /^\d{8}$/;
const erNombres = /^[a-zA-Z\s]+(?: [a-zA-Z\s]+)?{3,50}$/;
function enviar(){
    let cedula= document.getElementById('cedula').value;
    let nombres= document.getElementById('nombres').value;
    if (!erCedula.test(cedula)){
        alert('error en el formato de la cédula');
        return false;
}
    if (!erNombres.test(nombres)){
        alert('error en el formato del nombre');
        return false;
    }
    return true;
}