<table class="table">
    <tr>
        <th>Especialidad</th>
        {if $logueado}
        <th>Modificar</th>
        <th>Borrar</th>
        {/if}
    </tr>
    {foreach $especialidades item=especialidad}
        <tr>
            <td>{$especialidad.nombre_espec}</td>
            {if $logueado}
                <td><a href="{$BASE_URL}modificar/{$desde}/{$especialidad.id_espec}">Modificar</a></td>
                <td><a href="{$BASE_URL}eliminar/{$desde}/{$especialidad.id_espec}">Borrar</a></td>
            {/if}
        </tr>
    {/foreach}
</table>