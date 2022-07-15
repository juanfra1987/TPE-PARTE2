<?php

require_once('lib/Smarty.class.php');
require_once('helpers/AuthHelpers.php');
require_once('controlador/UsuariosControler.php');
class ProfesionalesVista
{

    function renderDoctores($doctores, $logueado, $consultaEspec)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('doctores', $doctores);
        $plantilla->assign('desde', "doctores");
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('consultaEspec', $consultaEspec);
        $plantilla->display('template/profesionales.tpl');
    }

    function renderModificacionProf($consultaDoc, $logueado, $doctores, $consultaEspec)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "doctores");
        $plantilla->assign('logueado', $logueado);
        $plantilla->assign('consultaDoc', $consultaDoc);
        $plantilla->assign('consultaEspec', $consultaEspec);
        $plantilla->assign('doctores', $doctores);
        $plantilla->display('template/profesionales.tpl');
    }

    function renderMostrarPerfilProf($consulta,$idUsuario,$log){
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('consulta', $consulta);
        $plantilla->assign('idUsuario', $idUsuario);
        $plantilla->assign('logueado', $log);
        $plantilla->display('template/perfilProfesional.tpl');
    }

}
