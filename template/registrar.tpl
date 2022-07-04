<form action="{BASE_URL}registro/{$desde}" method="post">
    <div>
        <label>Usuario:<input type="text" name="usuario" placeholder="paula" required></label><br>
        <label>Contrasena: <input type="password" name="password_usuario" placeholder="123456" required></label><br>
        <label>E-mail:<input type="text" name="email" placeholder="name@hotmail.com" required></label><br>  
        <select name="id_permiso_fk" required>
            <option>-- Seleccione --</option>
            {foreach $consultaPermisos item=permiso}
                <option value={$permiso.id}>{$permiso.tipo}</option>
            {/foreach}
            <input type="submit" value="Registarse">
    </div>
</form>