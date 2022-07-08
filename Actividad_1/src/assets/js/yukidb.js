/* 
 * FUNCIONES JAVASCRIPT
 * ====================
*/ 

// función que llama a una url para obtener el número de dependencias de un objeto.
// Con los parámetros que recibe, podemos reutilizar la función
function getDependencies(id,path,origin,dependencies) {
    var url = window.location.origin + "/views/"+path+"/getInfo.php?id="+id;

    fetch(`${url}`,{
        method: 'GET',
    })
    .then((response) => response.text())
    .then(response => {
        // sacamos el modal para confirmar el borrado
        document.getElementById('mensaje').innerHTML="La "+origin+" tiene "+response+" "+dependencies+". Se borrará todo el contenido";
        delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        delete_modal.show();
        switch(path) {
            case "platforms":
                document.getElementById('borrar').onclick = function() {deleteOrigin(id,path)};
                break;
            case "tvshows":
                document.getElementById('borrar').onclick = function() {deleteOrigin(id,path)};
                break;
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

// función que llama por POST para borrar un origen (plataforma, serie, ...)
function deleteOrigin(id,path){
    var url = window.location.origin + "/views/"+path+"/delete.php";

    fetch(`${url}`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          },

        body: "id="+id
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            // al borrar redirigimos al listado
            window.location="/views/"+path+"/";
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}