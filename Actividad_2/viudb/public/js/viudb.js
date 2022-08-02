/*
 * FUNCIONES JAVASCRIPT
 * ====================
*/

// función que llama a una url para obtener el número de dependencias de un objeto.
// Con los parámetros que recibe, podemos reutilizar la función
function getDependencies(id,path,origin,dependencies,csrf_token) {
    var url = window.location.origin + "/"+path+"/"+id+"/info";

    fetch(`${url}`,{
        method: 'GET',
    })
    .then((response) => response.text())
    .then(response => {
        if (path == "platforms" || path == 'tvshows') {
            //actualizamos el modal
            document.getElementById('mensaje').innerHTML="La "+origin+" tiene "+response+" "+dependencies+". Se borrará todo el contenido";
        }

        // sacamos el modal para confirmar el borrado
        $('#deleteModal').modal('show')

        document.getElementById('borrar').onclick = function() {deleteOrigin(id,path,csrf_token)};
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

// función que llama por 'DELETE' para borrar un origen (plataforma, serie, ...)
function deleteOrigin(id,path,csrf_token){
    var url =  window.location.origin + "/"+path+"/"+id+"/delete";

    fetch(`${url}`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            "X-CSRF-TOKEN": csrf_token
          },

        body: "id="+id
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            // al borrar redirigimos al listado
            console.log("III");
            window.location="/"+path;
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

