# Seguridad Web

Asignatura enfocada a la parte de seguridad en el mundo web, vulnerabilidades más explotadas en este ambiente y en cómo securizar nuestras aplicaciones.

## Activiades realizadas
En esta asignatura se han realizado dos asignaturas diferenciadas por la temática que tratan.

### Validación de formularios con Laravel
A la hora de validar datos enviados en un formulario no es suficiente con hacerlo en el frontend, sino que también tenemos que validarlos al llegar al backend y previo a insertar en la base de datos.

Se ha hecho uso del sistema de autenticación de Laravel, se ha modificado el registro de usuarios para añadir nuevos campos en el formulario y se han creado validaciones personalizadas para esos nuevos campos.

Tanto el código fuente utilizado como la memoria se encuentran en el directorio [Actividad_laravel](Actividad_laravel).


### Análisis de vulnerabilidades
Analizar un proyecto web ([http://testphp.vulnweb.com/](http://testphp.vulnweb.com/)) buscando vulnerabilidades más comunes.

Para ello se ha hecho uso de 
* [Arachni](https://www.arachni-scanner.com/)
* [sqlmap](https://sqlmap.org/)

La memoria realizada de esta actividad se encuentra en el directorio [Actividad_vulnerabilidades](Actividad_vulnerabilidades).