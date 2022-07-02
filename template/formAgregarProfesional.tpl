<div>
<form action="{$BASE_URL}agregar_profesional/{$desde}" method="POST">
        <label>Nombre: </label><input required type="text" name="nombre">
        <label>Dias de Atencion: </label><input required type="text" name="dias_atencion"><br>
        <label>Telefono: </label><input required type="text" name="telefono">
        <select name="especialidad">
            <option>-- Seleccione --</option>
            {foreach $consultaEspec item=especialidad}
            <option value="{$especialidad.id_espec}">{$especialidad.nombre_espec}</option>
            {/foreach}
            <input type="submit" value="Agregar">
</form>
</div>