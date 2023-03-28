<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Solicitud Ticket</title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/bootstrap/bootstrap.css">
  </head>
  <script src="js/val_ticket.js"></script>
  <body>
    <section>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
            <a class="navbar-brand" href="landing.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="login.php">Log In</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="solicitud.php">Crear</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="consulta.php">Buscar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="editar.php">Editar</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>          
  </section>
    <div class="contenedor">
      <form class="formulario" id="formulario">
        <h2>Solicitud Ticket</h2>
        <div class="campo">
          <label for="nombres">Nombres:</label>
          <input type="text" id="nombres" name="nombres" required />
        </div>
        <div class="campo">
          <label for="apellido_paterno">Apellido paterno:</label>
          <input
            type="text"
            id="apellido_paterno"
            name="apellido_paterno"
            required
          />
        </div>
        <div class="campo">
          <label for="apellido_materno">Apellido materno:</label>
          <input
            type="text"
            id="apellido_materno"
            name="apellido_materno"
            required
          />
        </div>
        <div class="campo">
          <label for="curp">CURP:</label>
          <input type="text" id="curp" name="curp" required />
        </div>
        <div class="campo">
          <label for="telefono">Teléfono:</label>
          <input type="text" id="telefono" name="telefono" required />
        </div>
        <div class="campo">
          <label for="celular">Celular:</label>
          <input type="text" id="celular" name="celular" required />
        </div>
        <div class="campo">
          <label for="email">Correo electrónico:</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="campo">
          <label for="fecha">Fecha de nacimiento:</label>
          <input type="date" id="fecha" name="fecha" required />
        </div>        
        <div>
            <label for="nivel">Nivel:</label>
            <select id="nivel" name="nivel">
              <option value="preparatoria">Preparatoria</option>
              <option value="universidad">Universidad</option>
              <option value="maestria">Maestria</option>
            </select>
          </div>
        <div>
          <label for="municipio">Municipio:</label>
          <select id="municipio" name="municipio">
          <?php
              include ("../controllers/municipioController.php");
              $munic = new municipios;
              $municipios=$munic->get_municipios();

              foreach ($municipios as $municipio){
                  echo "<option>a</option>";
              }
          ?>
          </select>
        </div>
        <div class="campo">
          <button type="submit">Obtener número de ticket</button>
        </div>
      </form>
    </div>
  </body>
</html>
