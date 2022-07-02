<?php
class AuthHelpers
{

    function __construct()
    {
        if ((session_status())==1){
        session_start();
        }
    }

    function loguearUsuario($nombre)
    {       
        $_SESSION["logueado"] = true;
        $_SESSION["username"] = $nombre;    
    }

    //devuelve si el usuario esta logueado o no
    function estaLogueado()
    {   
        if (isset($_SESSION["logueado"]) && ($_SESSION["logueado"]==true)){
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
