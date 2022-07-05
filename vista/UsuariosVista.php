<?php
require_once('lib/Smarty.class.php');
require_once('helpers/AuthHelpers.php');
require_once('controlador/UsuariosControler.php');
class UsuariosVista
{

    function renderUsuarios($permisos,$listadoUsuarios)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "usuarios");
        $plantilla->assign('listadoUsuarios',$listadoUsuarios); 
        $plantilla->assign('permisos',$permisos);       
        $plantilla->display('template/usuarios.tpl');
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
    function renderModificacionUsuario($consulta,$listadoUsuariosPermisos,$consultaPermisos,$listadoUsuarios)
    {
        $plantilla = new Smarty();
        $plantilla->assign('BASE_URL', BASE_URL);
        $plantilla->assign('desde', "usuarios");
        $plantilla->assign('consultaUsuario', $consulta);
        $plantilla->assign('listadoUsuarios',$listadoUsuarios);
        $plantilla->assign('listadoUsuariosPermisos',$listadoUsuariosPermisos);
        $plantilla->assign('permisos',$consultaPermisos);
        $plantilla->display('template/usuarios.tpl');
    }

}
