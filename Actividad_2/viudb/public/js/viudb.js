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
        $('#deleteModal').modal('show');

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
        method: 'DELETE',
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
            window.location="/"+path;
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

// abrimos el modal para añadir filmografía
function FilmographyModal() {
    // sacamos el modal para añadir filmografía
    $('#FilmographyModal').modal('show');
}

//preguntamos si queremos borrar la filmografía de un celebrity
function confirmDeleteFilmography(celebrity_id, episode_id, funcion,csrf_token){
    // sacamos el modal para confirmar el borrado
    $('#deleteModal').modal('show');

    document.getElementById('borrar').onclick = function() {deleteFilmography(celebrity_id, episode_id, funcion,'celebrities',csrf_token)};
}

//preguntamos si queremos borrar parte del casting de un episodio
function confirmDeleteCasting(episode_id, celebrity_id, funcion,csrf_token){
    // sacamos el modal para confirmar el borrado
    $('#deleteModal').modal('show');

    document.getElementById('borrar').onclick = function() {deleteFilmography(celebrity_id, episode_id, funcion,'episodes',csrf_token)};
}

// borramos parte de la filmografía de una celebrity
function deleteFilmography(celebrity_id, episode_id, funcion,origin,csrf_token){
    var url = window.location.origin + "/deleteFilmography";

    reqData = 'celebrity_id='+  celebrity_id + '&episode_id=' + episode_id+ '&funcion=' +funcion;
    fetch(`${url}`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            "X-CSRF-TOKEN": csrf_token
          },

        body: reqData
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            // al borrar redirigimos al listado
            window.location='show'
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}


// abrimos el modal para añadir idiomas
function languageModal() {
    $('#LanguageModal').modal('show');
}


//preguntamos si queremos borrar idiomas de un episodio
function confirmDeleteLanguageEpisode(episode_id, language_id, type,csrf_token){
    // sacamos el modal para confirmar el borrado
    $('#deleteModal').modal('show');
    document.getElementById('borrar').onclick = function() {deleteEpisodeLanguage(episode_id,language_id,type,csrf_token)};
}

// borra el idioma del episodio
function deleteEpisodeLanguage(episode_id,language_id,type,csrf_token){
    var url = window.location.origin + "/episodes/"+episode_id+"/show";

    reqData = 'action=delete_language&episode_id='+  episode_id + '&language_id=' + language_id+ '&type=' +type;
    fetch(`${url}`,{
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            "X-CSRF-TOKEN": csrf_token
          },

        body: reqData
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            // al borrar redirigimos al listado
            window.location="show";
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });

}
