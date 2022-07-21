

- Para que el app/helpers.php funcione:
  - he modificado el fichero **composer.json** y he añadido en la sección **autoload**:
```
"autoload": {
        ...

        "files": [
            "app/helpers.php"
        ]
```
  - y luego ejecutar:
```composer dump-autoload```

- Para el Storage:
    ```php artisan storage:link``


- Seeders:
El general: 

```php artisan db:seed --class=DatabaseSeeder ```

  - Ejecuta por debajo: 
        php artisan db:seed --class=PlatformSeeder
        php artisan db:seed --class=CelebritySeeder
        php artisan db:seed --class=TVShowSeeder
