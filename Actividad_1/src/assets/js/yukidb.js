/* 
 * FUNCIONES JAVASCRIPT
 * ====================
*/ 

// función que hace una petición POST para obtener el número de series de una plataforma.
function getPlatformShows(id) {
    var url = window.location.origin + "/views/platforms/getPlatformShows.php?id="+id;
    // const data = {id: id};

    fetch(`${url}`,{
        // TODO: si cambiamos en el delete.php a POST, aquí también.
        method: 'GET',
        // body: JSON.stringify(data),
        // headers: {
        //     'content-type': 'application/json'
        // },
    })
    .then((response) => response.text())
    .then(response => {
        document.getElementById('mensaje').innerHTML="La plataforma tiene "+response+" series. Se borrará todo el contenido";
        delete_modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        delete_modal.show();
        document.getElementById('borrar').onclick = function() {deletePlatform(id)};
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}

function deletePlatform(id){
    var url = window.location.origin + "/views/platforms/delete.php?id="+id;
    // const data = {id: id};

    fetch(`${url}`,{
        // TODO: si cambiamos en el delete.php a POST, aquí también.
        method: 'GET',
        // body: JSON.stringify(data),
        // headers: {
        //     'content-type': 'application/json'
        // },
    })
    .then((response) => response.text())
    .then(response => {
        if (response) {
            window.location="/views/platforms/";
        }
    })
    .catch(error => function(){
        alert("Error al borrar" + error);
    });
}