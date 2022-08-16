{if $logueado && $permiso==1}
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
                    <label  type="hidden" :data-id="comentario.id" id="id_comentario"> 
                    <input type="button" id="eliminar" value="Borrar" @click.event="eliminarComentario()">
                    </td>
            </tr>
        </table>
    </div> 
{/literal}
{else}
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
            </tr>
        </table>
    </div>
{/literal}
{/if}