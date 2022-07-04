<?php
require_once 'modelo/UsuariosModelo.php';
require_once 'controlador/ProfesionalesControler.php';
require_once 'vista/UsuariosVista.php';
require_once 'modelo/PermisosModel.php';

class UsuariosControlador
{
    private $modelo;
    private $modPermiso;
    private $helper;
    private $vista;
    
    function __construct()
    {
        $this->modelo = new UsuariosModel();
        $this->modPermiso = new PermisosModel();
        $this->helper = new AuthHelpers;
        $this->vista = new UsuariosVista;
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
            $usuario = $_POST['usuario'];
            $password = $_POST['contraseña'];
            $consulta = $this->modelo->obtenerUsuarioPorNombre($usuario);
            if ($this->verificarPassword($consulta, $password)) {
                $this->helper->loguearUsuario($consulta->usuario,$consulta->id_permiso_fk);        
                return $this->helper->estaLogueado();
            }
        }  
    function mostarRegistrar(){
            $consultaPermiso = $this->modPermiso->consultarPermisos();
            $this->vista->renderRegistro($consultaPermiso);
        }
    function registro(){
            $existe = $this->modelo->obtenerUsuarioPorNombre($_POST['usuario']);
            if (!$existe){
                $usuario=$_POST['usuario'];
                $passHash = password_hash($_POST['password_usuario'], PASSWORD_DEFAULT);
                $email=$_POST['email'];
                $id_permiso_fk=$_POST['id_permiso_fk'];
                $this->modelo->registrarUsuario($usuario,$passHash,$email,$id_permiso_fk);
                $this->helper->loguearUsuario($usuario,$id_permiso_fk); 
              
            }
            $this->vista->renderLogueo(); 
    }      
    }
