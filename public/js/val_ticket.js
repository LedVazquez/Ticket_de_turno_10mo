function datetime() {
  datetime = fetch("http://worldtimeapi.org/api/timezone/America/Chihuahua")
    .then((res) => res.json())
    .then((data) => {
      date = data.datetime;

      alert("Detalles validacion, fecha:\n" + date);
    });
}

function validate() {
  curp = document.getElementById("curp").value;
  nombre = document.getElementById("nombres").value;
  paterno = document.getElementById("apellido_paterno").value;
  materno = document.getElementById("apellido_materno").value;
  telefono = document.getElementById("telefono").value;
  celular = document.getElementById("celular").value;
  email = document.getElementById("email").value;

  if (!validateNombres(nombre)) {
    alert("El nombre debe tener entre 3 y 30 caracteres.");
    return;
  }
  if (!validateNombres(paterno)) {
    alert("El apellido paterno debe tener entre 3 y 30 caracteres.");
    return;
  }
  if (!validateNombres(materno)) {
    alert("El apellido materno debe tener entre 3 y 30 caracteres.");
    return;
  }
  if (!validateCurp(curp)) {
    alert("CURP no cumple los requisitos");
    return;
  }
  if (!validiateTel(telefono)) {
    alert("El telefono debe tener 10 digitos");
    return;
  }
  if (!validiateTel(celular)) {
    alert("El celular debe tener 10 digitos");
    return;
  }
  if (!validateEmail(email)) {
    alert("El correo no cumple los requisitos");
    return;
  }

  document.getElementById("check").style.display = "none";
  document.getElementById("submit").style.display = "block";

  datetime();
}
function validateCurp(curp) {
  let re = new RegExp(
    "[A-Z]{1}[AEIOU]{1}[A-Z]{2}[0-9]{2}" +
      "(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])" +
      "[HM]{1}" +
      "(AS|BC|BS|CC|CS|CH|CL|CM|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)" +
      "[B-DF-HJ-NP-TV-Z]{3}" +
      "[0-9A-Z]{1}[0-9]{1}$"
  );
  return re.test(curp);
}

function validateNombres(nom) {
  let re = new RegExp("[a-zA-Z ]{3,30}?$");
  return re.test(nom);
}

function validiateTel(num) {
  let re = new RegExp("\\d{10}");
  return re.test(num);
}
function validateEmail(email) {
  let re = new RegExp("^.+@[^.].*.[a-z]{2,}$");
  return re.test(email);
}
