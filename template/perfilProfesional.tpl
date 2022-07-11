
<div class="container">
    <img src={$consulta->imagen} alt={$consulta->nombre_prof}>
    <div>
    <h1>{$consulta->nombre_prof}</h1>
    <h2>{$consulta->nombre_espec}</h2>
    <h2>{$consulta->dias_atencion}</h2>
    <h3>{$consulta->telefono}</h3>
    </div>
    
    {include file="template/vue/comentarios.vue"}
    <form id="form-tarea" action="{$BASE_URL}agregar" method="post">
                            
    <label>Título: <input type="text" name="detalle"></label></p>
    <label>Descripcion: <number name="puntaje" cols="50" rows="10"></number></label></p>
    <input type="submit">
                            
    </form>
</div>

