# Máster Universitario en Desarrollo de Aplicaciones y Servicios Web

Este repositorio contiene una rama por cada una de las asignaturas del **Máster Universitario en Desarrollo de Aplicaciones y Servicios Web** realizado en la [VIU](https://www.universidadviu.com/es/).


## Asignaturas:

Las asignaturas que tiene este máster son:

- Seguridad Web
- Bases de datos Web
- Ingeniería de Software Web
- Desarrollo de aplicaciones Web 1: Lado del Servidor (back-end)
- Desarrollo de aplicaciones Web 2: Lado del Cliente (front-end) y multimedia
- Programación en dispositivos móviles (wearables)
- Análisis de datos Web
- Computación en la nube
- Gestión de proyectos en entornos ágiles


## ¿Por qué una rama por asignatura?
Empecé en un único repositorio diferenciando por directorios las asignaturas, y sin mezclar commits. Esto me permitía tener un histórico completo de lo realizado en cada asignatura, pero decidí moverlo a ramas huérfanas ([git switch --orphan rama](https://git-scm.com/docs/git-switch/2.23.0#Documentation/git-switch.txt---orphanltnew-branchgt).

¿Por qué este cambio? Básicamente porque quería tenerlo todo más separado sin mezclar históricos, y para evitar que en algún commit me pudiese llevar cambios de otras asignaturas por hacer el típico ```git commit -a```.

En algunas asignaturas hay un "submodule" repetido (el de la plantilla LaTeX), pero como a medida que pasa el tiempo lo he ido modificando, así cada rama se queda en su commit específico también.
