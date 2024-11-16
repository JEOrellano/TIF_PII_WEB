-- CREATE DATABASE IF NOT EXISTS DB_PAII_INTEGRADOR;
-- USE DB_PAII_INTEGRADOR;
-- DROP DATABASE IF EXISTS DB_PAII_INTEGRADOR;

-- DROP TABLE IF EXISTS Sexo;
CREATE TABLE IF NOT EXISTS Sexo(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Sexo PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Sexo (descripcion)
VALUES
("Hombes"),
("Mujeres");

-- DROP TABLE IF EXISTS Estudio;
CREATE TABLE IF NOT EXISTS Estudio(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Estudio PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Estudio (descripcion)
VALUES
("Primaria"),
("Secundaria"),
("Terciaria"),
("Universitaria"),
("Post-grado"),
("sin finalizar");

-- DROP TABLE IF EXISTS Edad;
CREATE TABLE IF NOT EXISTS Edad(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Edad PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Edad (descripcion)
VALUES
("< de 18"),
("18 a 35"),
("36 a 50"),
("51 a 65"),
("> de 65");

-- DROP TABLE IF EXISTS Trabajo;
CREATE TABLE IF NOT EXISTS Trabajo(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Trabajo PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Trabajo (descripcion)
VALUES
("1"),
("> 1");

-- DROP TABLE IF EXISTS Relacion_Contractual;
CREATE TABLE IF NOT EXISTS Relacion_Contractual(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Relacion_Contractual PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Relacion_Contractual (descripcion)
VALUES
("Relacion de dependencia"),
("Monotributista/autonomo"),
("Cuenta propista (no registrado)"),
("Voluntariado"),
("NS/NC");

-- DROP TABLE IF EXISTS Rubro;
CREATE TABLE IF NOT EXISTS Rubro(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Rubro PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Rubro (descripcion)
VALUES
("Tecnica"),
("Salud"),
("Educacion"),
("Administrativo"),
("Gobierno"),
("Comercio"),
("Cuidados y Asistencia Domestica"),
("Construccion"),
("Gastronomia"),
("Reciclado"),
("Trabajo de plataforma"),
("Otro");

-- DROP TABLE IF EXISTS Hora_Semanal;
CREATE TABLE IF NOT EXISTS Hora_Semanal(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Hora_Semanal PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Hora_Semanal (descripcion)
VALUES
("< 10"),
("11 ~ 32"),
("> 33");

-- DROP TABLE IF EXISTS Antiguedad;
CREATE TABLE IF NOT EXISTS Antiguedad(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Antiguedad PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Antiguedad (descripcion)
VALUES
("Menos de 1 año"),
("1 ~ 3 años"),
("4 ~ 7 años"),
("8 ~ 10 años"),
("mas de 10 años");

-- DROP TABLE IF EXISTS Salario;
CREATE TABLE IF NOT EXISTS Salario(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Salario PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Salario (descripcion)
VALUES
("Menos de $300.000"),
("$300.000 ~ $600.000"),
("$600.000 ~ $1M"),
("$1M ~ $3M"),
("Mas de $3M"),
("No");

-- DROP TABLE IF EXISTS Conforme;
CREATE TABLE IF NOT EXISTS Conforme(
id INT(11) NOT NULL AUTO_INCREMENT,
descripcion VARCHAR(45) NOT NULL,
CONSTRAINT PK_Conforme PRIMARY KEY (id) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Conforme (descripcion)
VALUES
("Si"),
("No"),
("No lo se");

-- DROP TABLE IF EXISTS Encuestador;
CREATE TABLE IF NOT EXISTS Encuestador(
cue VARCHAR(25) NOT NULL,
`password` VARCHAR(125) NOT NULL,
CONSTRAINT PK_Encuestador PRIMARY KEY (cue) 
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO Encuestador (cue,`password`)
VALUES
("001","1234"),
("002","1234"),
("003","1234"),
("004","1234"),
("005","1234");

-- DROP TABLE IF EXISTS Encuesta;
CREATE TABLE IF NOT EXISTS Encuesta(
id INT(11) NOT NULL AUTO_INCREMENT,
id_sexo INT(11) NOT NULL,
id_estudio INT(11) NOT NULL,
id_edad INT(11) NOT NULL,
id_trabajo INT(11) NOT NULL,
id_relacion_contractual INT(11) NOT NULL,
id_rubro INT(11) NOT NULL,
id_hora_semanal INT(11) NOT NULL,
id_antiguedad INT(11) NOT NULL,
id_salario INT(11) NOT NULL,
id_conforme INT(11) NOT NULL,
id_encuestador VARCHAR(25) NOT NULL,
CONSTRAINT PK_Encuesta PRIMARY KEY (id),
CONSTRAINT FK_Encuesta_Sexo FOREIGN KEY (id_sexo) REFERENCES Sexo (id),
CONSTRAINT FK_Encuesta_Estudio FOREIGN KEY (id_estudio) REFERENCES Estudio (id),
CONSTRAINT FK_Encuesta_Edad FOREIGN KEY (id_edad) REFERENCES Edad (id),
CONSTRAINT FK_Encuesta_Trabajo FOREIGN KEY (id_trabajo) REFERENCES Trabajo (id),
CONSTRAINT FK_Encuesta_Relacion_Contractual FOREIGN KEY (id_relacion_contractual) REFERENCES Relacion_Contractual (id),
CONSTRAINT FK_Encuesta_Rubro FOREIGN KEY (id_rubro) REFERENCES Rubro (id),
CONSTRAINT FK_Encuesta_Hora_Semanal FOREIGN KEY (id_hora_semanal) REFERENCES Hora_Semanal (id),
CONSTRAINT FK_Encuesta_Antiguedad FOREIGN KEY (id_antiguedad) REFERENCES Antiguedad (id),
CONSTRAINT FK_Encuesta_Salario FOREIGN KEY (id_salario) REFERENCES Salario (id),
CONSTRAINT FK_Encuesta_Conforme FOREIGN KEY (id_conforme) REFERENCES Conforme (id),
CONSTRAINT FK_Encuesta_Encuestador FOREIGN KEY (id_encuestador) REFERENCES Encuestador (cue)
)ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
