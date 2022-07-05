
<table class="table">
<tr>
    <th>Usuario</th>
    <th>Permiso</th>
    <th>Modificar</th>
    <th>Borrar</th>
</tr>
{foreach $listadoUsuarios item=usuario1}
    <tr>
        <td>{$usuario1.usuario}</td>
        <td>{$usuario1.id_permiso_fk}</td>
            <td><a href="{$BASE_URL}modificar/{$desde}/{$usuario1.id_usuario}">Modificar</a></td>
            <td><a href="{$BASE_URL}eliminar/{$desde}/{$usuario1.id_usuario}">Borrar</a></td>
        </tr>
{/foreach}
</table>