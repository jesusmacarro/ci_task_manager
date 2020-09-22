DROP DATABASE `ciproyecto`;
CREATE DATABASE `ciproyecto`;
USE `ciproyecto`;

CREATE TABLE `departamentos`(
    `id_dpto` TINYINT NOT NULL COMMENT 'Identificador del departamento.',
    `nombre_dpto` VARCHAR(20) NOT NULL COMMENT 'Nombre del departamento.',
    PRIMARY KEY(`id_dpto`)
) ENGINE = INNODB CHARSET = utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `prioridades`(
    `id_prioridad` TINYINT NOT NULL COMMENT 'Identificador de la prioridad.',
    `descripcion_prioridad` VARCHAR(50) NOT NULL COMMENT 'Descripción de la prioridad.',
    PRIMARY KEY(`id_prioridad`)
) ENGINE = INNODB CHARSET = utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `ciproyecto`.`estados`(
    `id_estado` TINYINT NOT NULL COMMENT 'Identificador del estado.',
    `descripcion_estado` VARCHAR (50) NOT NULL COMMENT 'Descripción del estado.',
    PRIMARY KEY(`id_estado`)
) ENGINE = INNODB CHARSET = utf8 COLLATE utf8_spanish_ci;

CREATE TABLE `tareas`(
    `id_tarea` INT(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la tarea.',
    `dpto_solicitante` TINYINT NOT NULL COMMENT 'Departamento que solicita la tarea.',
    `dpto_demandado` TINYINT NOT NULL COMMENT 'Departamento al que se le demanda la tarea.',
    `titulo_tarea` VARCHAR(200) NOT NULL COMMENT 'Título de la tarea.',
    `descripcion_tarea` TEXT NOT NULL COMMENT 'Descripción de la tarea.',
    `prioridad_tarea` TINYINT NOT NULL COMMENT 'Prioridad para la realización de la tarea.',
    `estado_tarea` TINYINT NOT NULL COMMENT 'Estado en el que se encuentra la tarea.',
    PRIMARY KEY(`id_tarea`)
) ENGINE = INNODB CHARSET = utf8 COLLATE utf8_spanish_ci;

ALTER TABLE
    `tareas` ADD FOREIGN KEY(`dpto_demandado`) REFERENCES `departamentos`(`id_dpto`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `tareas` ADD FOREIGN KEY(`dpto_solicitante`) REFERENCES `departamentos`(`id_dpto`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `tareas` ADD FOREIGN KEY(`prioridad_tarea`) REFERENCES `prioridades`(`id_prioridad`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE
    `tareas` ADD FOREIGN KEY(`estado_tarea`) REFERENCES `estados`(`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO `departamentos`(`id_dpto`, `nombre_dpto`)
VALUES('1', 'Dirección'),('2', 'Administración'),('3', 'Desarrollo Web'),('4', 'Soporte Informático');

INSERT INTO `prioridades`(`id_prioridad`, `descripcion_prioridad`)
VALUES('1', 'Alta'),('2', 'Media'),('3', 'Baja');

INSERT INTO `estados`(`id_estado`, `descripcion_estado`)
VALUES('1', 'Pendiente de asignación'),('2', 'Implementación'),('3', 'Validación'),('4', 'Pendiente de producción'),('5', 'Petición cerrada');

INSERT INTO `tareas`(
    `id_tarea`,
    `dpto_solicitante`,
    `dpto_demandado`,
    `titulo_tarea`,
    `descripcion_tarea`,
    `prioridad_tarea`,
    `estado_tarea`
)
VALUES(
    NULL,
    '1',
    '3',
    'Creación de nueva web para Endesa',
    'Se solicita la creación de una nueva web para Endesa en la que se creará una Base de Datos de sus oficinas en funcionamiento.',
    '2',
    '1'
),(
    NULL,
    '2',
    '4',
    'Credenciales de los trabajadores en práctica',
    'Se solicita crear credenciales para los nuevos trabajadores en práctica:\r\n\r\n-Fecha de incorporación: 1 de marzo de 2020',
    '1',
    '2'
),(
    NULL,
    '3',
    '3',
    'Implementación de nueva función en la web corporativa',
    'Se solicita implementación de nueva función en la web corporativa:\r\n\r\n- EMAIL requerido para las nuevas altas de usuarios.',
    '1',
    '3'
),(
    NULL,
    '4',
    '2',
    'Contratos de trabajadores en prácticas',
    'Se solicita copia de los contratos de los nuevos trabajadores en prácticas de nuestro departamento.',
    '3',
    '4'
);

