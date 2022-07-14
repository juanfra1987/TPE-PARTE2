{literal}
<div id="comentarios">
    <h3> {{subtitle}} </h3>
    <ul>
       <li v-for="comentario in comentarios">
          
           <span> {{ comentario.detalle }} - {{comentario.puntaje}} </span> 
       </li> 
    </ul>
</div>
{/literal}
<script src="{$BASE_URL}js/comentarios.js"></script>