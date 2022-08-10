# Instrucciones de despliegue
A continuación se facilitan las instrucciones para realizar el despliegue de la aplicación.

## Despligue con contenedor Docker
Junto con el código fuente se acompaña de un fichero **compose.yaml** que facilita realizar el despliegue de la aplicación. Este fichero levanta 3 servicios:

- **Servidor web con Nginx**: usa el puerto 80.
- **Servidor MySQL**: usa el puerto 3306. 
  - Crea la base de datos **actividad2** y un usuario con los siguientes credenciales de acceso:
    - **usuario**:  actividad2
    - **contraseña**: 4ct1v1d4d2
- **Servidor web con phpmyadmin**: utiliza el puerto 3307 para poder acceder de manera gráfica al servidor mysql.


## Código
Para realizar la instalación de las dependencias necesitamos realizar los siguientes comandos dentro del directorio "viudb":

```
composer install
npm install
```

De esta manera se instalan las dependencias necesarias.

## Base de datos
En caso de no utilizar los servicios Docker comentados previamente, hay que crear la base de datos y el usuario puesto en dicho apartado. En caso de realizar cualquier modificación de esos datos, hay que modificar el fichero **.env** con los nuevos datos para que Laravel los utilice.

### Despliegue de base de datos y datos de pruebas
Junto con el proyecto se ha creado los diferentes **migrates** para que el proyecto cree la base de datos y unos datos de pruebas. Para que todo funcione hay que ejecutar lo siguiente:

```
php artisan migrate
php artisan db:seed
```

Sólo es necesario ejecutar un comando de **seed** porque se han añadido todas las dependencias que se deben ejecutar en el fichero **viudb/database/seeds/DatabaseSeeder.php**


## Otras cuestiones a tener en cuenta
Se ha creado un fichero **app/helpers.php** con distintas funcione. Para que tenga en cuenta dicho fichero se ha modificado el fichero **composer.json** y he añadido en la sección **autoload**:

```
"autoload": {
        ...

        "files": [
            "app/helpers.php"
        ]
```
Y luego se ha ejecutado:
```composer dump-autoload```

En principio no hay necesidad de volverlo a ejecutar, pero se deja comentado.

### Para el directorio "storage"
Para utilizar las opciones de  Storage de Laravel y crear el directorio se ha utilizado:

```php artisan storage:link```

En principio no haría falta volver a hacerlo, ya que se ha commiteado el enlace. Pero por si hubiese errores con las imágenes, se deja documentado.

# Documentación extra
Para la documentación extra, se acompaña el fichero de la memoria en pdf.