CREATE DOMAIN genero_deportista as VARCHAR CHECK(
    VALUE IN ('masculino','femenino','nd')
);


CREATE TABLE DEPORTISTA(
    deportista_id SERIAL not null primary key,
    nombre VARCHAR(20) not null,
    apellidos VARCHAR(30),
    fecha_nacimiento date,
    genero genero_deportista,
    usuario VARCHAR (20) not null,
    password VARCHAR (20) not null
);


CREATE TABLE FEDERACION(
    federacion_id SERIAL not null primary key,
    nombre VARCHAR(50),
    direccion VARCHAR(70),
    web VARCHAR(50)
);


CREATE TABLE DEPORTE(
    deporte_id SERIAL not null primary key,
    nombre VARCHAR(50),
    federacion_id INTEGER not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE ENTRENAMIENTO(
    entrenamiento_id SERIAL not null primary key,
    nombre VARCHAR(50),
    fecha TIMESTAMPTZ,
    duracion INTEGER,
    distancia INTEGER,
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    deporte_id INTEGER not null REFERENCES deporte(deporte_id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE CAMPEONATO(
    campeonato_id SERIAL not null primary key,
    nombre VARCHAR(50),
    fecha_inicio TIMESTAMPTZ,
    fecha_fin TIMESTAMPTZ,
    federacion_id INTEGER not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE PRUEBA(
    prueba_id SERIAL not null primary key,
    nombre VARCHAR(50),
    distancia INTEGER,
    deporte_id INTEGER not null REFERENCES deporte(deporte_id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE LOGRO(
    logro_id SERIAL not null primary key,
    nombre VARCHAR(50)
);


CREATE TABLE RETO(
    reto_id SERIAL not null primary key,
    nombre VARCHAR(50),
    descripcion VARCHAR(200),
    fecha_inicio TIMESTAMPTZ,
    fecha_fin TIMESTAMPTZ,
    distancia INTEGER,
    tiempo INTEGER,
    deporte_id INTEGER not null REFERENCES deporte(deporte_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    logro_id INTEGER not null REFERENCES logro(logro_id) ON DELETE RESTRICT ON UPDATE CASCADE
);


CREATE TABLE EVENTO(
    evento_id SERIAL not null primary key,
    nombre VARCHAR(50),
    fecha_inicio TIMESTAMPTZ,
    distancia INTEGER,
    federacion_id INTEGER not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE PRACTICA(
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    deporte_id INTEGER not null REFERENCES deporte(deporte_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    federado boolean,
    numero_federado INTEGER,
    PRIMARY KEY (deportista_id,deporte_id)
);


CREATE TABLE ASISTE(
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    evento_id INTEGER not null REFERENCES evento(evento_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    tiempo_realizado INTEGER,
    PRIMARY KEY (deportista_id,evento_id)
);


-- para la competición se necesita que el tiempo (en segundos) tenga decimales
CREATE TABLE COMPITE(
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    prueba_id INTEGER not null REFERENCES prueba(prueba_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    campeonato_id INTEGER not null REFERENCES campeonato(campeonato_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    tiempo_realizado FLOAT,
    PRIMARY KEY (deportista_id,prueba_id,campeonato_id)
);


CREATE TABLE HACE(
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    reto_id INTEGER not null REFERENCES reto(reto_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    fecha_unirse TIMESTAMPTZ,
    fecha_completado TIMESTAMPTZ,
    PRIMARY KEY (deportista_id,reto_id)
);


CREATE TABLE OBTIENE(
    deportista_id INTEGER not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    logro_id INTEGER not null REFERENCES logro(logro_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    fecha TIMESTAMPTZ,
    PRIMARY KEY (deportista_id,logro_id)
);


-- Vistas
CREATE VIEW deportista_logro AS
  SELECT d.nombre as deportista_nombre, genero, l.nombre as logro_nombre, o.fecha
    FROM deportista AS d, logro AS l, obtiene AS o
    WHERE d.deportista_id = o.deportista_id AND o.logro_id = l.logro_id
;


CREATE VIEW marcas_oficiales AS
  SELECT d.nombre, d.apellidos, c.tiempo_realizado, p.nombre AS prueba, cmp.nombre AS campeonato
    FROM deportista d, compite c, prueba p, campeonato cmp
    WHERE d.deportista_id = c.deportista_id AND c.campeonato_id = cmp.campeonato_id AND c.prueba_id = p.prueba_id
;
