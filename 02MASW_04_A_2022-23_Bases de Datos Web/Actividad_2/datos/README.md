# Modificación de los datos originales

Los datos descargados de la web de OpenData se encuentran en el fichero **restaurantes-original.json**. Este fichero contiene cosas que hacen que no se pueda utilizar como un fichero json decente. Es por tanto que he tenido que hacer ciertas cosas para dejarlo de manera correcta y que lo pueda utilizar para la actividad. A continuación se detallan las modificaciones realizadas:

* Quitado el **jsonCallback(" de inicio y el ");" del final
* El json está mal formado, teniendo campos importantes duplicados. El problema es que esos campos la segunda vez que aparecen están vacíos, por lo que el json al ser parseado, se coge la "key" esa segunda vez estando vacío y por tanto los datos buenos se pierden. Con vim he quitado las siguientes líneas:
  * :%s/"address" : "",//g --> quitadas las líneas "address" vacías.
  * :%s/"phone" : "",//g  --> quitadas las líneas "phone" vacías.
* He creado el script **parser.py** que con el json resultante de los pasos anteriores genera lo que necesito:
  *  Me quedo con los campos que necesito.
  *  Hago lo que necesite para convertir algunos campos a enteros o floats (quitar espacios, o el "+" en el teléfono)