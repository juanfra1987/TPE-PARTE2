{literal}
<div id="app">
    <h3>{{titulo}}</h3>
    <ul>
       <li v-for="comentario in comentarios">
           <span> {{ comentario.detalle }} - {{comentario.puntaje}} </span> 
       </li> 
    </ul>
</div>
<script src="js/comentarios.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
{/literal}