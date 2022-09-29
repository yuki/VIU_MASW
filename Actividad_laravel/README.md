# Validaciones en Laravel 6.X

Actividad para tratar las validaciones custom en Laravel v6.x

## Despligue con contenedor Docker
Junto con el código fuente se acompaña de un fichero **compose.yaml** que facilita realizar el despliegue de la aplicación. Este fichero levanta 3 servicios:

- **Servidor web con Nginx**: usa el puerto 80.
- **Servidor MySQL**: usa el puerto 3306.
  - Crea la base de datos **actividad1** y un usuario con los siguientes credenciales de acceso:
    - **usuario**:  actividad1
    - **contraseña**: 4ct1v1d4d1
- **Servidor web con phpmyadmin**: utiliza el puerto 3307 para poder acceder mediante el navegador web al servidor mysql.


## Código
Para realizar la instalación de las dependencias necesitamos realizar los siguientes comandos dentro del directorio "src":

```
composer install
npm install
```

De esta manera se instalan las dependencias necesarias. 

Si estamos en el contenedor Docker del servicio web, el directorio donde hay que ejecutar estos comandos es **/app**.

## Base de datos
En caso de no utilizar los servicios Docker comentados previamente, hay que crear la base de datos y el usuario puesto en dicho apartado. 

En caso de realizar cualquier modificación de esos datos, hay que modificar el fichero **.env** con los nuevos datos para que Laravel los utilice.

### Despliegue de base de datos y datos de pruebas
Junto con el proyecto se ha creado los diferentes **migrates** para que el proyecto cree las tablas necesarias y unos datos de pruebas. Para que todo funcione hay que ejecutar lo siguiente:

```
php artisan migrate
php artisan db:seed
```

Sólo es necesario ejecutar un comando de **seed** porque se han añadido todas las dependencias que se deben ejecutar en el fichero **src/database/seeds/DatabaseSeeder.php**


### Usuarios de acceso a la aplicación
Se ha creado un usuario en el seed. Los credenciales son:
- **e-mail**: seguridadweb@campusviu.es
- **contraseña**: S3gur1d4d?W3b

Estos credenciales están en el fichero **src/database/seeds/UserSeeder.php**.
