<?php

use PhpMyAdmin\Server\Select;

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
                $this->helper->loguearUsuario($consulta->usuario,$consulta->id_permiso_fk,$consulta->id_usuario);        
                return $this->helper->estaLogueado();
            }
        }  

    //muestra en el formulario de registrarse    
    function mostarRegistro(){
            $consultaPermiso = $this->modPermiso->consultarPermisos();
            $this->vista->renderRegistro($consultaPermiso);
        }

    // manda a registrar al usuario nuevo    
    function registro(){
            $existe = $this->modelo->obtenerUsuarioPorNombre($_POST['usuario']);
            if (!$existe){
                $usuario=$_POST['usuario'];
                $passHash = password_hash($_POST['password_usuario'], PASSWORD_DEFAULT);
                $email=$_POST['email'];
                $id_permiso_fk=2;
                $idUsuario= $this->modelo->registrarUsuario($usuario,$passHash,$email,$id_permiso_fk);
                $this->helper->loguearUsuario($usuario,$id_permiso_fk,$idUsuario); 
            }
            $this->vista->renderLogueo(); 
    } 
    
    //
    // lleva los datos para la modificacion de usuarios por el administrador
    function mostrarUsuarios()  
    {
        $permisos = $this->modPermiso->consultarPermisos();
        $listaUsuarios = $this->modelo->obtenerUsuarios();
        $this->vista->renderUsuarios($permisos,$listaUsuarios);
    } 
   
    //actualiza el usuario que se modifico y renderiza
    function actualizarUsuario($id)
    {
        $usuario = $_POST['nombre'];
        $id_permiso_fk = $_POST['permiso'];
        $this->modelo->modificarUsuario($id,$usuario,$id_permiso_fk);
        $this->mostrarUsuarios();
    }

    //elimina el usuario seleccionado
    function eliminarUsuario($id)
    {
        $this->modelo->eliminarRegistro($id);
    }

     //levanta los datos del usuario el cual se desea modificar
     function obtenerDatosUsuario($id)
     {
         $consultaPermisos = $this->modPermiso->consultarPermisos();
         $listaUsuarios = $this->modelo->obtenerUsuarios();
         $consultaUsuariosPermiso = $this->modelo->consultarUsuarioPermiso();
         $consulta = $this->modelo->obtenerUsuario($id);
         $this->vista->renderModificacionUsuario($consulta, $consultaUsuariosPermiso, $consultaPermisos,$listaUsuarios);
     }

    }
