<?php
require_once 'modelo/UsuariosModelo.php';
require_once 'controlador/ProfesionalesControler.php';

class UsuariosControlador
{
    private $modelo;
    private $helper;
    
    function __construct($logueado)
    {
        $this->modelo = new UsuariosModel();
        $this->helper = $logueado;
    }

    //verifica si el password ingresado coincide con el password hasheado
    function verificarPassword($consulta, $password)
    {
        if (!empty($consulta) && password_verify($password, ($consulta->password_usuario))) {
            return true;
        }
        return false;
    }

    //loguea al usuario
    function login() {
            $nombre = $_POST['usuario'];
            $password = $_POST['contraseña'];
            $consulta = $this->modelo->obtenerUsuarioPorNombre($nombre);
            if ($this->verificarPassword($consulta, $password)) {
                $this->helper->loguearUsuario($nombre);        
                return $this->helper->estaLogueado();
            }
        }    
    }
