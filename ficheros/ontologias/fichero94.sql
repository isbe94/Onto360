# SQL Manager 2007 for MySQL 4.1.2.1
# ---------------------------------------
# Host     : localhost
# Port     : 3306
# Database : onto_360


SET FOREIGN_KEY_CHECKS=0;

DROP DATABASE IF EXISTS `onto_360`;

CREATE DATABASE `onto_360`
    CHARACTER SET 'latin1'
    COLLATE 'latin1_swedish_ci';

USE `onto_360`;

#
# Structure for the `categoriacientifica` table : 
#

CREATE TABLE `categoriacientifica` (
  `idcatcientifica` int(20) NOT NULL AUTO_INCREMENT,
  `categcient` varchar(30) NOT NULL,
  PRIMARY KEY (`idcatcientifica`),
  UNIQUE KEY `categcient` (`categcient`),
  UNIQUE KEY `idcatcientifica` (`idcatcientifica`),
  UNIQUE KEY `categcient_2` (`categcient`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `clasificacion` table : 
#

CREATE TABLE `clasificacion` (
  `idclasificacion` int(20) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(50) NOT NULL,
  PRIMARY KEY (`idclasificacion`),
  UNIQUE KEY `clasificacion` (`clasificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

#
# Structure for the `rol` table : 
#

CREATE TABLE `rol` (
  `idrol` int(20) NOT NULL AUTO_INCREMENT,
  `rol` varchar(40) NOT NULL,
  PRIMARY KEY (`idrol`),
  UNIQUE KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

#
# Structure for the `experticia` table : 
#

CREATE TABLE `experticia` (
  `idexperticia` int(11) NOT NULL AUTO_INCREMENT,
  `grado_experiencia` varchar(20) NOT NULL,
  PRIMARY KEY (`idexperticia`),
  UNIQUE KEY `grado_experiencia` (`grado_experiencia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

#
# Structure for the `usuario` table : 
#

CREATE TABLE `usuario` (
  `usuario` varchar(64) NOT NULL,
  `nombre` char(64) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `idusuario` int(20) NOT NULL AUTO_INCREMENT,
  `id_rol` int(20) NOT NULL,
  `auth_key` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `apellido1` varchar(40) DEFAULT NULL,
  `apellido2` varchar(20) DEFAULT NULL,
  `activo` int(11) NOT NULL,
  `id_catcientifica` int(20) NOT NULL,
  `id_experticia` int(11) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `correo_2` (`correo`),
  KEY `idrol` (`id_rol`),
  KEY `usuario_fk1` (`id_catcientifica`),
  KEY `usuario_fk2` (`id_experticia`),
  CONSTRAINT `usuario_fk` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_fk1` FOREIGN KEY (`id_catcientifica`) REFERENCES `categoriacientifica` (`idcatcientifica`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `usuario_fk2` FOREIGN KEY (`id_experticia`) REFERENCES `experticia` (`idexperticia`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

#
# Structure for the `lenguaje` table : 
#

CREATE TABLE `lenguaje` (
  `idlenguaje` int(20) NOT NULL AUTO_INCREMENT,
  `lenguaje` varchar(20) NOT NULL,
  PRIMARY KEY (`idlenguaje`),
  UNIQUE KEY `idlenguaje` (`idlenguaje`),
  UNIQUE KEY `lenguaje` (`lenguaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# Structure for the `ontologia` table : 
#

CREATE TABLE `ontologia` (
  `idontologia` int(20) NOT NULL AUTO_INCREMENT,
  `dominio` varchar(45) NOT NULL,
  `fichero` varchar(1000) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_usuario` int(20) DEFAULT NULL,
  `name_space` varchar(500) DEFAULT NULL,
  `version` float(9,1) DEFAULT NULL,
  `id_lenguaje` int(20) DEFAULT NULL,
  PRIMARY KEY (`idontologia`),
  UNIQUE KEY `nombre` (`nombre`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_lenguaje` (`id_lenguaje`),
  CONSTRAINT `ontologia_fk` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `ontologia_fk1` FOREIGN KEY (`id_lenguaje`) REFERENCES `lenguaje` (`idlenguaje`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

#
# Structure for the `clasificacion_ontologia` table : 
#

CREATE TABLE `clasificacion_ontologia` (
  `idclasifonto` int(20) NOT NULL AUTO_INCREMENT,
  `id_clasificacion` int(20) NOT NULL,
  `id_ontologia` int(20) NOT NULL,
  PRIMARY KEY (`idclasifonto`),
  UNIQUE KEY `idclasifonto` (`idclasifonto`),
  UNIQUE KEY `id_ontologiauniq` (`id_ontologia`,`id_clasificacion`),
  KEY `id_clasificacion` (`id_clasificacion`),
  KEY `id_ontologia` (`id_ontologia`),
  CONSTRAINT `clasificacion_ontologia_fk` FOREIGN KEY (`id_clasificacion`) REFERENCES `clasificacion` (`idclasificacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `clasificacion_ontologia_fk1` FOREIGN KEY (`id_ontologia`) REFERENCES `ontologia` (`idontologia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1 AVG_ROW_LENGTH=1365;

#
# Structure for the `comentario` table : 
#

CREATE TABLE `comentario` (
  `idcomentario` int(20) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `id_ontologia` int(20) NOT NULL,
  `fecha` date DEFAULT NULL,
  `id_usuario` int(20) NOT NULL,
  PRIMARY KEY (`idcomentario`),
  KEY `comentario_fk` (`id_ontologia`),
  KEY `comentario_fk1` (`id_usuario`),
  CONSTRAINT `comentario_fk` FOREIGN KEY (`id_ontologia`) REFERENCES `ontologia` (`idontologia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comentario_fk1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`idusuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=latin1;

#
# Structure for the `pregunta` table : 
#

CREATE TABLE `pregunta` (
  `idpregunta` int(20) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(500) NOT NULL,
  PRIMARY KEY (`idpregunta`),
  UNIQUE KEY `idpregunta` (`idpregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

#
# Structure for the `respuesta` table : 
#

CREATE TABLE `respuesta` (
  `idrespuesta` int(20) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(500) NOT NULL,
  PRIMARY KEY (`idrespuesta`),
  UNIQUE KEY `idrespuesta` (`idrespuesta`),
  UNIQUE KEY `respuesta` (`respuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

#
# Structure for the `pregunta_respuestas` table : 
#

CREATE TABLE `pregunta_respuestas` (
  `idpregunta_respuestas` int(20) NOT NULL AUTO_INCREMENT,
  `id_respuesta` int(20) NOT NULL,
  `id_pregunta` int(20) NOT NULL,
  `resp_correcta` int(1) DEFAULT NULL,
  PRIMARY KEY (`idpregunta_respuestas`),
  UNIQUE KEY `idcuestionario` (`idpregunta_respuestas`),
  UNIQUE KEY `id_preguntauniq` (`id_pregunta`,`id_respuesta`),
  KEY `id_respuesta` (`id_respuesta`),
  KEY `id_pregunta` (`id_pregunta`),
  CONSTRAINT `pregunta_fk` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta` (`idpregunta`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `respuesta_fk` FOREIGN KEY (`id_respuesta`) REFERENCES `respuesta` (`idrespuesta`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

#
# Structure for the `tecnologia` table : 
#

CREATE TABLE `tecnologia` (
  `idtecnologia` int(20) NOT NULL AUTO_INCREMENT,
  `tecnologia` varchar(20) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  PRIMARY KEY (`idtecnologia`),
  UNIQUE KEY `idtecnologia` (`idtecnologia`),
  UNIQUE KEY `tecnologia` (`tecnologia`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

#
# Data for the `categoriacientifica` table  (LIMIT 0,500)
#

INSERT INTO `categoriacientifica` (`idcatcientifica`, `categcient`) VALUES 
  (2,'Doctor'),
  (5,'Ingeniero'),
  (3,'Master'),
  (6,'Ninguna');

COMMIT;

#
# Data for the `clasificacion` table  (LIMIT 0,500)
#

INSERT INTO `clasificacion` (`idclasificacion`, `clasificacion`) VALUES 
  (13,'Alto Nivel'),
  (11,'Aplicación'),
  (16,'Dominio'),
  (7,'Formal'),
  (8,'General'),
  (9,'Genérica'),
  (14,'Livianas'),
  (15,'Pesadas'),
  (12,'Representación  Conocimiento'),
  (3,'Tarea'),
  (6,'Terminológica');

COMMIT;

#
# Data for the `rol` table  (LIMIT 0,500)
#

INSERT INTO `rol` (`idrol`, `rol`) VALUES 
  (1,'Administrador'),
  (2,'Miembro');

COMMIT;

#
# Data for the `experticia` table  (LIMIT 0,500)
#

INSERT INTO `experticia` (`idexperticia`, `grado_experiencia`) VALUES 
  (3,'Alto'),
  (4,'Bajo'),
  (6,'Experto'),
  (2,'Medio'),
  (5,'No Evaluado');

COMMIT;

#
# Data for the `usuario` table  (LIMIT 0,500)
#

INSERT INTO `usuario` (`usuario`, `nombre`, `contrasena`, `idusuario`, `id_rol`, `auth_key`, `created_at`, `updated_at`, `avatar`, `apellido1`, `apellido2`, `activo`, `id_catcientifica`, `id_experticia`, `correo`) VALUES 
  ('isa','Isabela','165a1761634db1e9bd304ea6f3ffcf2b',2,1,NULL,NULL,'2017-10-22','usuario_2.jpg','Perez','Dominguez',1,2,3,'isa@gmail.com'),
  ('isbel','Isbel','2cd4fa9bda74f17caaed5179c8f91517',17,1,NULL,'2017-08-16','2017-10-22','user.jpg','Del Toro','Iglesias',1,5,3,'isbe94@gmail.com'),
  ('sandra','Sandra','202cb962ac59075b964b07152d234b70',35,1,NULL,'2017-08-31','2017-10-22','usuario_35.jpg','Alvarez','Lopez',1,6,5,'san@gmail.com'),
  ('peter','Pedro','51dc30ddc473d43a6011e9ebba6ca770',36,2,NULL,NULL,'2017-10-22','usuario_36.jpg','Pérez','Téllez',1,5,6,'peter@gmail.com'),
  ('rosita','Rosa','45c6f0923e6a87454183b56c0935d253',39,2,NULL,'2017-10-19','2017-10-22','usuario_39.jpg','Vacca','Torrens',1,3,5,'rosi@gmail.com'),
  ('cami','Camila','f5ffc847c2072ffb5fda82edd30bc19f',40,2,NULL,NULL,'2017-10-22','usuario_40.jpg','Toro','Perez',1,3,6,'cami@gmail.com'),
  ('ame','Amelia','176226b2d51002d2590f048881560569',41,2,NULL,'2017-10-21','2017-10-22','usuario_41.jpg','Gómez','Gómez',1,5,4,'ame@gmail.com'),
  ('roxy','Roxy','abaa15dcb9f3462b1cebdd85ae36b47b',43,2,NULL,'2017-10-22','2017-10-22','usuario_43.jpg','Pérez','Téllez',1,6,5,'ro@gmail.com');

COMMIT;

#
# Data for the `ontologia` table  (LIMIT 0,500)
#

INSERT INTO `ontologia` (`idontologia`, `dominio`, `fichero`, `nombre`, `id_usuario`, `name_space`, `version`, `id_lenguaje`) VALUES 
  (5,'anuevo','ontologia_5.4.owl','anuevo',NULL,NULL,NULL,NULL),
  (22,'Ontologiacvv','ontologia_22.4.owl','Onto360',NULL,NULL,NULL,NULL),
  (28,'gd','ontologia_28.4.owl','gd',NULL,NULL,NULL,NULL),
  (29,'f','ontologia_29.4.owl','f',NULL,NULL,NULL,NULL),
  (30,'anuevo','ontologia_30.4.owl','asdfghjkl',NULL,NULL,NULL,NULL),
  (65,'yhgjhgj','fichero65.4.owl','aasdff',35,'',0.1,NULL),
  (66,'ax','fichero66.4.owl','Onto361',35,NULL,NULL,NULL),
  (67,'a','ontologia_67.4.owl','a',NULL,'agfdjghjsdghj',12,NULL),
  (68,'asasas','fichero68.4.owl','as',17,'dfgh',1,NULL),
  (69,'medicina','ontologia_69.4.owl','MedCUBA',NULL,'',2.2,NULL),
  (80,'ReinoAnimal','fichero80.4.owl','ZoologicoOnto',17,'dfs',1.2,NULL),
  (81,'dfsfsd','ontologia_81.4.owl','fsgfs',36,'sdfghjkuyt',2.3,NULL),
  (83,'medicina','ontologia_83.4.owl','medCubaOnto',NULL,'dfghjsdjdjsjsjj',1.3,NULL),
  (84,'gatos','ontologia_84.4.owl','ontoCat',40,'gha/hajhsuas/sa',1.2,NULL),
  (85,'medicina','ontologia_85.owl','AnsioOnto',17,'dfsdf/dfs/dsfs',0.3,NULL),
  (86,'literatura','ontologia_86.4.owl','LitOnto',NULL,'ffh',1,NULL),
  (87,'Informáticaff','ontologia_87.4.owl','ontoInfo',35,'hhhhg',0.9,NULL);

COMMIT;

#
# Data for the `clasificacion_ontologia` table  (LIMIT 0,500)
#

INSERT INTO `clasificacion_ontologia` (`idclasifonto`, `id_clasificacion`, `id_ontologia`) VALUES 
  (108,6,22),
  (109,7,22),
  (97,7,65),
  (98,7,68),
  (110,6,80),
  (114,7,81),
  (116,6,84),
  (118,7,84),
  (119,16,85),
  (120,11,87);

COMMIT;

#
# Data for the `comentario` table  (LIMIT 0,500)
#

INSERT INTO `comentario` (`idcomentario`, `comentario`, `id_ontologia`, `fecha`, `id_usuario`) VALUES 
  (1,'Muy buena ontologia',66,'2017-09-27',35),
  (2,'a mi tambien me parece buena',66,'2017-09-28',2),
  (4,'es una ontologia muy completa',66,'2017-09-27',35),
  (5,'si es una muy buena ontologia',66,'2017-09-28',17),
  (6,'esta muy buena',22,'2017-09-28',17),
  (7,'me gustaria.........',22,'2017-09-29',17),
  (8,'salio todo bien',66,'2017-09-29',17),
  (10,'es muy buena',65,'2017-09-29',17),
  (11,'si a mi tambien me gusto',65,'2017-09-29',35),
  (60,'probando',22,'2017-10-18',36),
  (61,'ojala salga',65,'2017-10-18',36),
  (62,'sigo probando',22,'2017-10-18',36),
  (66,'bye bye',30,'2017-10-18',36),
  (73,'algo nuevo',28,'2017-10-18',36),
  (77,'es muy buena',84,'2017-10-19',40),
  (78,'me gusta mucho',84,'2017-10-19',40),
  (79,'hola',66,'2017-10-19',35),
  (81,'es muy buena',87,'2017-10-19',35),
  (82,'asss',66,'2017-10-19',35),
  (83,'si me gusta',87,'2017-10-19',35),
  (84,'si a mi tambien me gustó',87,'2017-10-21',17),
  (125,'me pareció interesante',85,'2017-10-22',41),
  (126,'si a mi también me pareció lo mismo',85,'2017-10-22',43),
  (129,'ontoinfo es una de las mejores',87,'2017-10-22',43),
  (130,'gd es buena',28,'2017-10-22',43),
  (131,'la ontología GD es muy interesante',28,'2017-10-22',43),
  (132,'sepodría mejorar en este aspecto',87,'2017-10-22',43),
  (133,'ansioonto es una ontología.............',85,'2017-10-22',36);

COMMIT;

#
# Data for the `pregunta` table  (LIMIT 0,500)
#

INSERT INTO `pregunta` (`idpregunta`, `pregunta`) VALUES 
  (2,'Una ontología es una formalización o especificación formal explícita de una conceptualización compartida de un dominio determinado.'),
  (4,'Las ontologías lingüística tambien son llamadas:'),
  (5,'Las ontologías no tienen aplicación en la  descripción de contenidos para facilitar la recuperación de los mismos.'),
  (6,'Uno de los requerimiento de los lenguajes de ontología es un método de razonamiento eficiente.'),
  (7,'Algunos lenguajes de codificación de ontologías no derivados de XML son'),
  (8,'OWL (Web Ontology Language) se basa en gran medida en RDF Schema'),
  (9,'Los conceptos fundamentales de RDF son recursos, propiedades y sentencias. '),
  (10,'En OWL (Web Ontology Language) las clases predefinidas son owl:Thing y:');

COMMIT;

#
# Data for the `respuesta` table  (LIMIT 0,500)
#

INSERT INTO `respuesta` (`idrespuesta`, `respuesta`) VALUES 
  (11,'CycL, KIF, LOOM'),
  (4,'Falso'),
  (13,'LOOM, OKBC, XMLSchema'),
  (12,'Ontilingua, RDF, RDF Schema'),
  (10,'Ontolgías de Tarea'),
  (7,'Ontologías de Alto Nivel'),
  (6,'Ontologías de Dominio'),
  (8,'Ontologías Terminológicas'),
  (15,'owl:Class'),
  (14,'owl:Nothing'),
  (17,'owl:ObjectProperty'),
  (16,'owl:unionOf'),
  (1,'Verdadero');

COMMIT;

#
# Data for the `pregunta_respuestas` table  (LIMIT 0,500)
#

INSERT INTO `pregunta_respuestas` (`idpregunta_respuestas`, `id_respuesta`, `id_pregunta`, `resp_correcta`) VALUES 
  (18,4,2,NULL),
  (31,6,4,NULL),
  (35,7,4,NULL),
  (36,10,4,NULL),
  (38,4,5,5),
  (44,8,4,4),
  (48,4,6,NULL),
  (49,1,6,6),
  (51,1,5,NULL),
  (52,11,7,7),
  (55,13,7,NULL),
  (58,12,7,NULL),
  (59,1,8,8),
  (60,4,8,NULL),
  (61,1,9,9),
  (62,4,9,NULL),
  (63,14,10,10),
  (64,15,10,NULL),
  (65,16,10,NULL),
  (66,17,10,NULL),
  (67,1,2,2);

COMMIT;

#
# Data for the `tecnologia` table  (LIMIT 0,500)
#

INSERT INTO `tecnologia` (`idtecnologia`, `tecnologia`, `direccion`) VALUES 
  (7,'hola','http://localhost/Tecnologías');

COMMIT;

