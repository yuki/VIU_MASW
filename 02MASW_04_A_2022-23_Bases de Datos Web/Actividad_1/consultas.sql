-- consultas JOIN
SELECT d.nombre, l.nombre as logro, o.fecha 
  FROM deportista d 
    LEFT JOIN obtiene o ON d.deportista_id = o.deportista_id 
    LEFT JOIN logro l ON o.logro_id = l.logro_id 
  WHERE l.logro_id  = 1 
  ORDER BY fecha;


SELECT d.nombre, d.apellidos, ca.nombre AS campeonato, p.nombre AS prueba, c.tiempo_realizado 
  FROM deportista d 
    LEFT JOIN compite c ON d.deportista_id = c.deportista_id 
    LEFT JOIN campeonato ca ON c.campeonato_id = ca.campeonato_id 
    LEFT JOIN prueba p ON c.prueba_id = p.prueba_id 
  WHERE tiempo_realizado IS NOT NULL;


-- consultas con función de agregación
SELECT COUNT(*) AS Logros_entregados 
  FROM obtiene;


SELECT d.nombre, d.apellidos, MIN(tiempo_realizado) AS record 
  FROM compite c, deportista d 
  WHERE prueba_id = 1 AND d.deportista_id = c.deportista_id 
  GROUP BY (d.nombre, d.apellidos);
