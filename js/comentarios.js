let app = new Vue({
    el: "#comentarios",
    data: {
        subtitle: "Estos comentarios se renderizan desde el cliente usando Vue.js",
        comentarios: []
    },
    methods: {
        obtenerComentarios: function() {
            obtenerComentarios();
        }
    }
});


function obtenerComentarios() {
    let id=document.getElementById("id_prof").value;
    fetch('api/profesional/comentario/' + id)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
        })
        .catch(error => console.log(error));
}

obtenerComentarios();


document.querySelector("#form-comentarios").addEventListener('submit', (e)=>agregarComentario(e)); 

function agregarComentario(e) {
    e.preventDefault();

    let data = {
        detalle: document.querySelector("#detalle").value,
        puntaje: document.querySelector("#puntaje").value,
        id_prof: document.querySelector("#id_prof").value,
        id_usuario: document.querySelector("#id_usuario").value

    }

    fetch('api/profesional/comentario', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(response=>response.text())
        .then(response => {
            console.log(response);
            obtenerComentarios();
        })
        .catch(error => console.log(error));
}