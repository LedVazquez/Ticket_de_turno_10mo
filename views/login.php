<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/bootstrap/bootstrap.css">
  </head>
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
      <form class="formulario">
        <h2>Iniciar sesión</h2>
        <div class="campo">
          <label for="usuario">Usuario:</label>
          <input type="text" id="usuario" name="usuario" required />
        </div>
        <div class="campo">
          <label for="contrasena">Contraseña:</label>
          <input type="password" id="contrasena" name="contrasena" required />
        </div>
        <div class="campo">
          <button type="submit">Iniciar sesión</button>
        </div>
      </form>
    </div>
  </body>
</html>
