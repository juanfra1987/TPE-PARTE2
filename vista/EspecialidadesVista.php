<?php

require_once('lib/Smarty.class.php');
require_once('helpers/AuthHelpers.php');
require_once('controlador/UsuariosControler.php');
class EspecialidadesVista
{

    function renderEspecialidades($especialidades, $logueado)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('especialidades', $especialidades);
        $plantilla->assign('desde', "especialidades");
        $plantilla->display('template/especialidades.tpl');
    }

    function renderModificacionEspec($consultaEsp, $logueado, $especialidades)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "especialidades");
        $plantilla->assign('especialidades', $especialidades);
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('consultaEsp', $consultaEsp);
        $plantilla->display('template/especialidades.tpl');
    }
}
