  <nav>
    <ul class="barra">
        <li class="barramenu"><a href="{$BASE_URL}home">Inicio</a></li>
        <li class="barramenu"><a href="{$BASE_URL}doctores">Doctores</a></li>
        <li class="barramenu"><a href="{$BASE_URL}especialidades">Especialidades</a></li>
        {if (isset($logueado)) && !($logueado)}
            <li class="barramenu"><a href="{$BASE_URL}registrar">Registrarse</a></li>     
        {elseif {$smarty.session.permiso}==1}
            <li class="barramenu"><a href="{$BASE_URL}usuarios">Modificar Usuarios</a></li>
        {/if}
        </ul>
</nav>