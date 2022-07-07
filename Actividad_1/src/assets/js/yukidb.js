/* 
 * FUNCIONES JAVASCRIPT
 * ====================
*/ 

// función que llama a una url para obtener el número de series de una plataforma.
function getPlatformShows(id) {
    var url = window.location.origin + "/views/platforms/getPlatformShows.php?id="+id;

    fetch(`${url}`,{
        method: 'GET',
    })
    .then((response) => response.text())
    .then(response => {
        // sacamos el modal para confirmar el borrado
        document.getElementById('mensaje').innerHTML="La plataforma tiene "+response+" series. Se borrará todo el contenido";
        delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        delete_modal.show();
        document.getElementById('borrar').onclick = function() {deletePlatform(id)};
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

// función que llama por POST a borrar una plataforma.
function deletePlatform(id){
    var url = window.location.origin + "/views/platforms/delete.php";

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
            window.location="/views/platforms/";
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}