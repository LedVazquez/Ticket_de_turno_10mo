const formulario = document.getElementById('formulario');
const inputs = formulario.getElementsByTagName('input');

formulario.addEventListener('submit', (event) => {
    event.preventDefault();
    validarCampos();
});

function validarCampos() {
    let errores = [];

    for (let i = 0; i < inputs.length; i++) {
        if (!inputs[i].value) {
            errores.push(`El campo ${inputs[i].name} es obligatorio.`);
        }
    }

    if (errores.length > 0) {
        mostrarErrores(errores);
    } else {
        enviarFormulario();
    }
}

function mostrarErrores(errores) {
    const mensaje = errores.join('\n');
    alert(mensaje);
}

function enviarFormulario() {
    formulario.submit();
}

// Función para validar la fecha de nacimiento
function validarFecha() {
    const fechaInput = document.getElementById("fecha");
    const fecha = new Date(fechaInput.value);
    const ahora = new Date();
    if (fecha > ahora) {
      alert("La fecha de nacimiento no puede ser en el futuro.");
      return false;
    }
    return true;
  }
  
  // Agrega la validación de la fecha al evento "submit" del formulario
  const solicitud = document.getElementById("formulario");
  formulario.addEventListener("submit", function (event) {
    event.preventDefault(); // previene que se envíe el formulario
  
    // Valida los campos del formulario
    if (validarNombres() && validarApellidoPaterno() && validarApellidoMaterno() && validarCurp() && validarTelefono() && validarCelular() && validarEmail() && validarFecha()) {
      // Envía el formulario
      formulario.submit();
    }
  });
  