{literal}
    <div id="comentarios">
        <h3> {{subtitle}} </h3>
        <table class="table">
            <tr>
                <th>Comentario</th>
                <th>Puntaje</th>
                <th>Borrar</th>
            </tr>
            <tr v-for="comentario in comentarios">
                <td>{{comentario.detalle}}</td>
                <td>{{comentario.puntaje}}</td>
                <td> 
                <form id="formDelComentario">
                <input type="hidden" :value={comentario.id} id="id_comentario"> 
                <input type="submit" value="Borrar">
                </form>
                </td>
            </tr>
        </table>
    </div>
{/literal}