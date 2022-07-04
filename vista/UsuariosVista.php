<?php
require_once('lib/Smarty.class.php');
require_once('helpers/AuthHelpers.php');
require_once('controlador/UsuariosControler.php');
class UsuariosVista
{

    function renderUsuarios($logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('desde', "home");
        $plantilla->display('template/home.tpl');
    }
    function renderLogueo(){
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "logueo");
        $plantilla->display('template/logueo.tpl');   
    }
     
    function renderRegistro($consultaPermisos){
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "registro");
        $plantilla->assign('consultaPermisos',$consultaPermisos);
        $plantilla->display('template/registro.tpl');      
    }
}