let app = new Vue({
    el: "#comentarios",
    data: {
        subtitle: "Estos comentarios se renderizan desde el cliente usando Vue.js",
        comentarios: []
    },
    methods: {
        obtenerComentarios: function() {
            obtenerComentarios(id);
        }
    }
});


function obtenerComentarios(id) {
    fetch('api/profesional/comentario/' + id)
        .then(response => response.json())
        .then(comentarios => {
            app.comentarios = comentarios; // similar a $this->smarty->assign("tasks", $tasks)
        })
        .catch(error => console.log(error));
}

obtenerComentarios(id);


document.querySelector("#form-comentarios").addEventListener('submit', agregarComentario);

function agregarComentario(e) {
    e.preventDefault();

    let data = {
        detalle: document.querySelector("input[name=detalle]").value,
        puntaje: document.querySelector("number[name=puntaje]").value,
    }

    fetch('api/profesional/comentario' {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(response => {
            obtenerComentarios();
        })
        .catch(error => console.log(error));
}