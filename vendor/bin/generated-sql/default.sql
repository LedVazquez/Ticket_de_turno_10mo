
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- municipios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `municipios`;

CREATE TABLE `municipios`
(
    `id_municipio` INTEGER NOT NULL AUTO_INCREMENT,
    `municipio` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id_municipio`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tickets
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tickets`;

CREATE TABLE `tickets`
(
    `id_ticket` INTEGER NOT NULL AUTO_INCREMENT,
    `nom_completo` VARCHAR(200) NOT NULL,
    `curp` VARCHAR(200) NOT NULL,
    `nombres` VARCHAR(200) NOT NULL,
    `paterno` VARCHAR(200) NOT NULL,
    `materno` VARCHAR(200) NOT NULL,
    `telefono` VARCHAR(200) NOT NULL,
    `celular` VARCHAR(200) NOT NULL,
    `email` VARCHAR(200) NOT NULL,
    `nivel` VARCHAR(200) NOT NULL,
    `estatus` INTEGER NOT NULL,
    PRIMARY KEY (`id_ticket`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- turnos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `turnos`;

CREATE TABLE `turnos`
(
    `id_municipio` INTEGER NOT NULL,
    `id_ticket` INTEGER NOT NULL,
    `numero` int unsigned NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuarios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`
(
    `id_usuario` INTEGER NOT NULL AUTO_INCREMENT,
    `usuario` VARCHAR(200) NOT NULL,
    `pass` VARCHAR(200) NOT NULL,
    PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
