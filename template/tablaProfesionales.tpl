

<table class="table">
    <tr>
        <th>Nombre</th>
        <th>Especialidad</th>
        <th>Telefono</th>
        <th>Dias atencion</th>
        {if $logueado}
        <th>Modificar</th>
        <th>Borrar</th>
        {/if}
    </tr>
    {foreach $doctores item=doctor}
        <tr>
            <td>{$doctor.nombre_prof}</td>
            <td>{$doctor.nombre_espec}</td>
            <td>{$doctor.telefono}</td>
            <td>{$doctor.dias_atencion}</td>
            {if $logueado}
                <td><a href="{$BASE_URL}modificar/{$desde}/{$doctor.id_prof}">Modificar</a></td>
                <td><a href="{$BASE_URL}eliminar/{$desde}/{$doctor.id_prof}">Borrar</a></td>
            {/if}
        </tr>
    {/foreach}
</table>