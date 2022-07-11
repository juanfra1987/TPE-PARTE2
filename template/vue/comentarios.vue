{literal}
<section id="template-vue-comentarios">
    <h3> {{ subtitle }} </h3>

    <ul>
       <li v-for="comentario in comentarios">
          
           <span> {{ comentario.detalle }} - {{comentario.puntaje}} </span> 
       </li> 
    </ul>
</section>
<script src="js/comentarios.js"></script>
{/literal}