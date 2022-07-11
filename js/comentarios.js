const app = new Vue({
    el: "#app",
    data: {
        titulo: "Estos comentarios se renderizan desde el cliente usando Vue.js",
        comentarios: [] 
    }
})

function obtenerComentarios() {
    fetch('api/obtenerComentarios')
    .then(response => response.json())
    .then(comentarios => {
        app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
    })
    .catch(error => console.log(error));
}

obtenerComentarios();


document.querySelector("#form-comentarios").addEventListener('submit', agregarComentario);

function agregarComentario(e) {
    e.preventDefault();
    
    let data = {
        detalle:  document.querySelector("input[name=detalle]").value,
        puntaje:  document.querySelector("number[name=puntaje]").value,
    }

    fetch('api/comentario', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},       
        body: JSON.stringify(data) 
     })
     .then(response => {
         obtenerComentarios();
     })
     .catch(error => console.log(error));
}

