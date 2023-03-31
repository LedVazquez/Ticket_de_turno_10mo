<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
  'default' => 
  array (
    'tablesByName' => 
    array (
      'municipios' => '\\models\\Map\\MunicipiosTableMap',
      'tickets' => '\\models\\Map\\TicketsTableMap',
      'turnos' => '\\models\\Map\\TurnosTableMap',
      'usuarios' => '\\models\\Map\\UsuariosTableMap',
    ),
    'tablesByPhpName' => 
    array (
      '\\Municipios' => '\\models\\Map\\MunicipiosTableMap',
      '\\Tickets' => '\\models\\Map\\TicketsTableMap',
      '\\Turnos' => '\\models\\Map\\TurnosTableMap',
      '\\Usuarios' => '\\models\\Map\\UsuariosTableMap',
    ),
  ),
));
