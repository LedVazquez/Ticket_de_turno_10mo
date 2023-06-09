<!DOCTYPE html>
<html>
<head>
	<title>Consulta de Clientes</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div class="formulario">
          <h2>Consultar clientes</h2>
          <form>
            <div class="campo">
              <label for="busqueda">Búsqueda por nombre o CURP:</label>
              <input type="text" id="busqueda" name="busqueda" required>
            </div>
            <div class="campo">
              <button type="submit" onclick="buscarCliente()">Buscar</button>
            </div>
          </form>
          <div id="resultado">
            <!-- Aquí se mostrarán los resultados de la búsqueda -->
          </div>
          <div id="botones">
            <button type="button" onclick="eliminarCliente()">Eliminar</button>
            <button type="button" onclick="modificarCliente()">Modificar</button>
            <button type="button" onclick="registrarCliente()">Registrar</button>
            <label for="estatus">Estatus:</label>
            <select id="estatus" name="estatus">
              <option value="resuelto">Resuelto</option>
              <option value="pendiente">Pendiente</option>
            </select>
            <button type="button" onclick="cambiarEstatus()">Cambiar estatus</button>
          </div>
        </div>
      </div>
      
</body>
</html>      