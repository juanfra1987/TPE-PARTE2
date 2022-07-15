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
        </li> 
    </table>
</div>
{/literal}
