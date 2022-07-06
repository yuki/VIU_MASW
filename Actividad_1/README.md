# Actividad 1

## Despliegue
Para hacer funcionar la el código fuente de la carpeta **src**:

* Hay un fichero **compose.yaml** que levanta lo necesario con ```docker-compose up```
  * Puerto 80: Servidor web **Nginx** + **PHP**
    * Coge el código y lo inserta en el contenedor para que funcione
  * Puerto 3306: MySQL (credenciales en el propio compose.yaml)
  * Puerto 3307: PHPMyAdmin (para simplificar el acceso)
* **create_schema.sql** para crear las tablas de la base de datos
* **inserts.sql** para meter datos en las tablas
  
## Documentación
Mirar el fichero **pdf** para ver la documentación de la actividad.