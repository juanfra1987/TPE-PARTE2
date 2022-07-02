<form action="{$BASE_URL}actualizar/{$desde}/{$consultaEsp->id_espec}" method="POST">
    <label>Nombre: </label>
    <input type="text" required name="nombre" value="{$consultaEsp->nombre_espec}">
        <input type="submit" value="Actualizar">
</form>