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
        if (path != "episodes") {
            //actualizamos el modal
            document.getElementById('mensaje').innerHTML="La "+origin+" tiene "+response+" "+dependencies+". Se borrará todo el contenido";
        }
        
        // sacamos el modal para confirmar el borrado
        delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        delete_modal.show();
        
        document.getElementById('borrar').onclick = function() {deleteOrigin(id,path)};
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

// abrimos el modal para añadir filmografía
function FilmographyModal() {
    filmography_modal = new bootstrap.Modal(document.getElementById('FilmographyModal'));
    filmography_modal.show();
}

//preguntamos si queremos borrar la filmografía de un celebrity
function confirmDeleteFilmography(celebrity_id, episode_id, funcion){
    // sacamos el modal para confirmar el borrado
    delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
    delete_modal.show();
    
    document.getElementById('borrar').onclick = function() {deleteFilmography(celebrity_id, episode_id, funcion)};
}

// borramos parte de la filmografía de una celebrity
function deleteFilmography(celebrity_id, episode_id, funcion){
    var url = window.location.origin + "/views/celebrities/deleteFilmography.php";

    reqData = 'id='+  celebrity_id + '&episode_id=' + episode_id+ '&funcion=' +funcion;
    fetch(`${url}`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
          },

        body: reqData
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            // al borrar redirigimos al listado
            window.location="/views/celebrities/show.php?id="+celebrity_id;
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}