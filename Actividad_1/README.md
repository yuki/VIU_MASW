# Actividad 1

## Despliegue
Para hacer funcionar el código fuente de la carpeta **src**:

* Hay un fichero **compose.yaml** que levanta los servicios necesarios con ```docker-compose up```
  * Puerto 80: Servidor web **Nginx** + **PHP**
    * Crea un volumen compartiendo el código de src y lo comparte en el contenedor en /app para que funcione 
  * Puerto 3306: **MySQL**. Credenciales:
    * Nombre de la base de datos: actividad1
    * User: actividad1
    * Pass: 4ct1v1d4d1
  * Puerto 3307 por web: **PHPMyAdmin**. Se puede acceder a MySQL poniendo "mysql" (sin commillas) como servidor. Los contenedores Docker se conocen entre sí por el hostname, así no hace falta poner IPs.

## Base de datos:
Para realizar la creación de las tablas existen dos ficheros:
* **create_schema_inserts.sql**: crea las tablas y mete datos en las tablas. **Se recomienda importar este fichero**. Básicamente es un dump realizado desde PHPMyAdmin.
* **create_schema.sql**: Sólo crea las tablas. Ideal para tener la aplicación sin datos.

## Configuración de la aplicación
Existe un fichero **src/config.php** para configurar el acceso a la base de datos. Si se usa docker-compose debería funcionar tal cual.

Si usas MAMP tendrás que cambiar el apartado $conf["db_host"] y puede que el $conf["db_port"].


# Documentación
Mirar el fichero **pdf** para ver más en detalle la documentación de la actividad.
