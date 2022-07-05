<form action="{$BASE_URL}actualizar/{$desde}/{$consultaUsuario->id_usuario}" method="POST">
    <label>Nombre: </label>
    <input type="text" required name="nombre" value="{$consultaUsuario->usuario}">
    <label>Permiso </label>
    <select name="permiso">
        <option>-- Seleccione --</option>
        {foreach $permisos item=permiso}
            {if $consultaUsuario->id_permiso_fk==$permiso.id}
                <option selected value="{$permiso.id}">{$permiso.id}{"  "}{$permiso.tipo}</option>
            {else}
                <option value="{$permiso.id}">{$permiso.id}{"  "}{$permiso.tipo}</option>
            {/if}
        {/foreach}
        <input type="submit" value="Actualizar">
</form>