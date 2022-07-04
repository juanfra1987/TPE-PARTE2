<?php
class AuthHelpers
{

    function __construct()
    {
        if ((session_status())==1){
        session_start();
        }
    }

    function loguearUsuario($nombre,$permiso)
    {    
        $_SESSION["username"] = $nombre;   
        $_SESSION["permiso"] = $permiso;
    
    }

    //devuelve si el usuario esta logueado el tipo de permiso o no
    function estaLogueado()
    {   
        if (isset($_SESSION["permiso"]) && ($_SESSION["permiso"]!=0)){
            return true;  
        }
        return false;
    } 
    function estaRegistrado()
    {   
        if (isset($_SESSION["permiso"]) && ($_SESSION["permiso"]!=0)){
            return true;  
        }
        return false;
    } 
    //cierra la sesion
    function cerrarSession()
    {
       session_unset();
    }
    
}
