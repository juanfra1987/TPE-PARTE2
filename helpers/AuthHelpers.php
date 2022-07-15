<?php

use Symfony\Component\VarExporter\Internal\Values;

class AuthHelpers
{

    function __construct()
    {
        if ((session_status())==1){
        session_start();
        }
    }

    function loguearUsuario($nombre,$permiso,$idUsuario)
    {    
        $_SESSION["username"] = $nombre;   
        $_SESSION["permiso"] = $permiso;
        $_SESSION["idUsuario"] = $idUsuario;
    }

    //devuelve si el usuario esta logueado o no
    function estaLogueado()
    {   
        if (isset($_SESSION["permiso"]) && ($_SESSION["permiso"]!=0)){
            return true;  
        }
        return false;
    } 
    
    function esAdministrador()
    {   
        if (isset($_SESSION["permiso"]) && ($_SESSION["permiso"]!=1)){
            return false;
        }
        return true;
    } 

    //cierra la sesion
    function cerrarSession()
    {
       session_unset();
    }

    function obtenerIdUsuario(){
        return $_SESSION["idUsuario"];
    }
    
}
