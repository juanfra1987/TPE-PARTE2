<?php
require_once('lib/Smarty.class.php');
require_once('helpers/AuthHelpers.php');
require_once('controlador/UsuariosControler.php');
class homeVista
{

    function renderHome($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('desde', "home");
        $plantilla->display('template/home.tpl');
    }
}
