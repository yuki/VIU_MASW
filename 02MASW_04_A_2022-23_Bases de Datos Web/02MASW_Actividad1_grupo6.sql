
CREATE DOMAIN genero_deportista as varchar CHECK(
    VALUE IN ('masculino','femenino','nd')
);



CREATE TABLE DEPORTISTA(
    deportista_id serial not null primary key,
    nombre varchar(20) not null,
    apellidos varchar(30),
    fecha_nacimiento date,
    genero genero_deportista
);


CREATE TABLE FEDERACION(
    federacion_id serial not null primary key,
    nombre varchar(50),
    direccion varchar(70),
    web varchar(50)
);

CREATE TABLE DEPORTE(
    deporte_id serial not null primary key,
    nombre varchar(50),
    federacion_id integer not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE ENTRENAMIENTO(
    entrenamiento_id serial not null primary key,
    nombre varchar(50),
    fecha timestamptz,
    duracion integer,
    distancia integer,
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
    deporte_id integer REFERENCES deporte(deporte_id) ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE CAMPEONATO(
    campeonato_id serial not null primary key,
	nombre varchar(50),
	fecha_inicio timestamptz,
	fecha_fin timestamptz,
	federacion_id integer not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE PRUEBA(
    prueba_id serial not null primary key,
	nombre varchar(50),
	distancia integer,
	deporte_id integer REFERENCES deporte(deporte_id) ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE LOGRO(
    logro_id serial not null primary key,
	nombre varchar(50)
);


CREATE TABLE RETO(
    reto_id serial not null primary key,
	nombre varchar(50),
	descripcion varchar(200),
	fecha_inicio timestamptz,
	fecha_fin timestamptz,
	distancia integer,
	tiempo integer,
	deporte_id integer REFERENCES deporte(deporte_id) ON DELETE SET NULL ON UPDATE CASCADE,
	logro_id integer REFERENCES logro(logro_id) ON DELETE SET NULL ON UPDATE CASCADE
);


CREATE TABLE EVENTO(
    evento_id serial not null primary key,
	nombre varchar(50),
	descripcion varchar(200),
	fecha_inicio timestamptz,
	distancia integer,
	federacion_id integer not null REFERENCES federacion(federacion_id) ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE PRACTICA(
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
	deporte_id integer REFERENCES deporte(deporte_id) ON DELETE SET NULL ON UPDATE CASCADE,
	federado boolean,
	PRIMARY KEY (deportista_id,deporte_id)
);


CREATE TABLE ASISTE(
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
	evento_id integer REFERENCES evento(evento_id) ON DELETE SET NULL ON UPDATE CASCADE,
	tiempo_realizado integer,
	PRIMARY KEY (deportista_id,evento_id)
);


CREATE TABLE COMPITE(
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
	prueba_id integer REFERENCES prueba(prueba_id) ON DELETE SET NULL ON UPDATE CASCADE,
	campeonato_id integer REFERENCES campeonato(campeonato_id) ON DELETE SET NULL ON UPDATE CASCADE,
	tiempo_realizado integer,
	PRIMARY KEY (deportista_id,prueba_id,campeonato_id)
);


CREATE TABLE HACE(
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
	reto_id integer REFERENCES reto(reto_id) ON DELETE SET NULL ON UPDATE CASCADE,
	fecha_unirse timestamptz,
	fecha_completado timestamptz,
	PRIMARY KEY (deportista_id,reto_id)
);


CREATE TABLE OBTIENE(
    deportista_id integer not null REFERENCES deportista(deportista_id) ON DELETE CASCADE ON UPDATE CASCADE,
	logro_id integer REFERENCES logro(logro_id) ON DELETE SET NULL ON UPDATE CASCADE,
	fecha timestamptz,
	PRIMARY KEY (deportista_id,logro_id)
);
