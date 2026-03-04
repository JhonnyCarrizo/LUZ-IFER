const erCedula =/^\d{7,8}$/;
const erNombres = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/;
const erUser = /^[a-zA-Z0-9_]{4,16}$/;
function enviar () {
    let cedula = document.getElementById('cedula').value;
    let apellidos = document.getElementById('apellidos').value;
    let nombres = document.getElementById('nombres').value;
    let user = document.getElementById('user').value;
    const checkboxes = document.querySelectorAll('input[name="roles[]"]:checked');
    const rolesId = Array.from(checkboxes).map(e => e.value);
    

    if (!erCedula.test(cedula)) {
        alert('Error en cedula');
        return false;
    }
    if (!erNombres.test(apellidos)) {
        alert('Error en apellidos');
        return false;
    }
    if (!erNombres.test(nombres)) {
        alert('Error en nombres');
        return false;
    }
    if (!erUser.test(user)) {
        alert('Error en usuario');
        return false;
    }
    if (rolesId.length === 0) {
        alert('Debe seleccionar uno o mas rol');
        return false;
    }
    return true;
}