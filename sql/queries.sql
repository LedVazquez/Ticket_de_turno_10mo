-- tabla de informacion del ticket
CREATE TABLE `ticket`.`tickets` (
    `id_ticket` INT(11) NOT NULL AUTO_INCREMENT ,
    `nom_completo` VARCHAR(200) NOT NULL ,
    `curp` VARCHAR(200) NOT NULL ,
    `nombres` VARCHAR(200) NOT NULL ,
    `paterno` VARCHAR(200) NOT NULL ,
    `materno` VARCHAR(200) NOT NULL ,
    `telefono` VARCHAR(200) NOT NULL ,
    `celular` VARCHAR(200) NOT NULL ,
    `email` VARCHAR(200) NOT NULL ,
    `nivel` VARCHAR(200) NOT NULL ,
    'estatus' varchar(200) not null,
    PRIMARY KEY (`id_ticket`))
ENGINE = InnoDB;
-- 

-- tabla para cada municipio y su id
CREATE TABLE `ticket`.`municipios` (
    `id_municipio` INT(11) NOT NULL AUTO_INCREMENT ,
    `municipio` VARCHAR(200) NOT NULL ,
    PRIMARY KEY (`id_municipio`))
ENGINE = InnoDB;
-- 

-- tabla para relacionar cada ticket con el municipio y su respectivo numero
CREATE TABLE `ticket`.`turnos` (
    `id_municipio` INT(11) NOT NULL ,
    `id_ticket` INT(11) NOT NULL,
    'turno' int(11) not null )
ENGINE = InnoDB;    
-- query para crear indices en la tabla de turnos para poder relacionar las tablas
ALTER TABLE `turnos` ADD INDEX(`id_municipio`);
ALTER TABLE `turnos` ADD INDEX(`id_ticket`);
-- 

-- tabla de informacion del ticket
CREATE TABLE `ticket`.`usuarios` (
    `id_usuario` INT(11) NOT NULL AUTO_INCREMENT ,
    `usuario` VARCHAR(200) NOT NULL ,
    `pass` VARCHAR(200) NOT NULL ,
    PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;
-- 
