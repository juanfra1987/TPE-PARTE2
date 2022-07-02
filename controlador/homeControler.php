<?php
require_once 'vista/homeVista.php';
require_once 'helpers/AuthHelpers.php';
require_once 'controlador/UsuariosControler.php';

class homeControlador
{
    private $logueado;
    private $vistaHome;

    function __construct()
    {
        $this->vistaHome=new homeVista();
        $this->logueado = new AuthHelpers();
    }

    
    function mostrarHome()
    {
        $log = $this->logueado->estaLogueado();
        $this->vistaHome->renderHome($log);
    }
}
