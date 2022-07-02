<form action="{$BASE_URL}actualizar/{$desde}/{$consultaDoc->id_prof}" method="POST">
    <label>Nombre: </label>
    <input type="text" required name="nombre" value="{$consultaDoc->nombre_prof}">
    <label>Dias de Atencion: </label>
    <input type="text" required name="dias_atencion" value="{$consultaDoc->dias_atencion}"><br>
    <label>Telefono: </label>
    <input type="text" required name="telefono" value="{$consultaDoc->telefono}">
    <select name="especialidad">
        <option>-- Seleccione --</option>
        {foreach $consultaEspec item=especialidad}
            {if $especialidad.id_espec==$consultaDoc->id_especialidad}
                <option selected value="{$especialidad.id_espec}">{$especialidad.nombre_espec}</option>
            {else}
                <option value="{$especialidad.id_espec}">{$especialidad.nombre_espec}</option>
            {/if}
        {/foreach}
        <input type="submit" value="Actualizar">
</form>