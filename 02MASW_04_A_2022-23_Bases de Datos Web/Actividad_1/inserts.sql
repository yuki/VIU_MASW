INSERT INTO federacion (nombre, direccion, web) values 
 ('Real Federación Española de Atletismo', 'Av. Valladolid, 81, 1º - 28008 Madrid', 'https://www.rfea.es/'),
 ('Real Federación Española De Ciclismo','C/ Ferraz 16 - 5º Derecha - 28008, Madrid','https://rfec.com/')
;

INSERT INTO deporte (nombre, federacion_id) values
  ('Footing', 1),
  ('Andar', 1),
  ('Ciclismo', 2),
  ('Atletismo', 1)
;


INSERT INTO deportista (nombre, apellidos, fecha_nacimiento, genero, usuario, "password") values
  ('Rubén', 'Gómez Olivencia', '1983-03-30', 'masculino', 'ruben', 'password'),
  ('Asier', 'Gómez Olivencia', '1979-08-22', 'masculino', 'asier', 'password'),
  ('Rafael', 'Gómez Millán', '1954-04-19', 'masculino', 'rafa', 'password'),
  ('Carmen', 'Olivencia Cardenas', '1952-02-21', 'femenino', 'carmen', 'password')
;

INSERT INTO entrenamiento (nombre, fecha, duracion, distancia, deportista_id, deporte_id) values
  ('Entrenamieto de mañana', '2022-05-15 11:00', 53, 8, 1, 1),
  ('Monte de tarde', '2022-05-16 19:15', 95, 10, 1, 2),
  ('Ciclismo de mañana', '2022-05-17  11:00', 83, 27, 1, 3),
  ('Entrenamieto de mañana', '2022-05-15  11:00', 53, 8, 2, 2),
  ('Monte de tarde', '2022-05-13  11:00', 95, 10, 2, 2),
  ('Ciclismo de tarde', '2022-05-10  19:00', 83, 22, 2, 3),
  ('Arariz', '2022-05-15  8:00', 97, 8, 3, 2),
  ('Monte caramelo', '2022-05-16 8:00', 95, 7, 3, 2),
  ('Arraiz', '2022-05-17 8:00', 83, 6, 3, 2),
  ('Andar', '2022-05-15 11:00', 15, 1, 4, 2),
  ('Andar', '2022-05-16 11:00', 20, 1, 4, 2),
  ('Andar', '2022-05-17 11:00', 28, 3, 4, 2)
;

INSERT INTO campeonato (nombre, fecha_inicio, fecha_fin, federacion_id) values
  ('Campeonato de España', '2022-07-15', '2022-07-20', 1),
  ('Campeonato de España cubierto', '2022-11-15', '2022-11-20', 1),
  ('Vuelta a España', '2022-08-30', '2022-09-20', 2)
;


INSERT INTO prueba (nombre, distancia, deporte_id) values
  ('100 metros lisos', 100, 4),
  ('110 metros vallas', 110, 4),
  ('Maratón', 42195, 4),
  ('30  kilómetros velódromo', 3000, 3)
;

INSERT INTO logro (nombre) values
  ('Día de la tierra'),
  ('Empezando bien el año')
;

INSERT INTO reto (nombre, descripcion, fecha_inicio, fecha_fin, distancia, tiempo, deporte_id, logro_id) values 
  ('10 kilómetros en menos de 1 hora', 'Realizar 10 kilómetros a paso rápido antes de una semana', '2022-05-18', '2022-05-25', 10000, 60, 1, 1),
  ('Correr 5 km', 'Correr 5 kilómetros antes de que termine el mes', '2022-05-01', '2022-05-31', 5000, 0, 4, 1),
  ('200 kilómetros en bici', 'Andar 200 kilómetros antes de que termine el mes', '2022-05-01', '2022-05-31', 200000, 0, 3, 1),
  ('10 kilómetros de inicio de año', 'Realizar 10 kilómetros para empezar bien el año', '2022-01-01', '2022-01-07', 10000, 60, 1, 2)
;


INSERT INTO evento (nombre, fecha_inicio, distancia, federacion_id) values
  ('Marcha popular', '2022-02-01', 10000, 1),
  ('Carrera popular', '2022-03-01', 5000, 1),
  ('Ciclismo popular', '2022-04-01', 25000, 2),
  ('Ciclismo por la seguridad en carretera', '2022-05-01', 35000, 2)
;


INSERT INTO practica (deportista_id, deporte_id, federado, numero_federado) values
  (1, 4, true, 1264),
  (2, 3, true, 6745)
;


INSERT INTO asiste (deportista_id, evento_id, tiempo_realizado) values
  (1, 1, 900),
  (1, 2, 240),
  (1, 3, 3600),
  (2, 1, 800),
  (2, 3, 300),
  (3, 1, 1200)
;


INSERT INTO compite (deportista_id, prueba_id, campeonato_id, tiempo_realizado) values
  (1, 1, 1, 10.432),
  (1, 2, 1, 11.98),
  (1, 1, 2, 10.12),
  (1, 2, 2, 12.04)
;

INSERT INTO hace (deportista_id, reto_id, fecha_unirse, fecha_completado) values
  (1, 1, '2022-05-19', null),
  (1, 2, '2022-05-02', '2022-05-11'),
  (2, 1, '2022-05-20', '2022-05-21'),
  (3, 1, '2022-05-19', '2022-05-22')
;


INSERT INTO obtiene (deportista_id, logro_id, fecha) values
  (1, 1, '2022-05-19 19:14'),
  (1, 2, '2022-01-03 11:24'),
  (2, 1, '2022-05-21 18:02'),
  (3, 1, '2022-05-22 12:54')
;


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
