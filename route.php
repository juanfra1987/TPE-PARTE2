<?php
define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

require_once 'controlador/ProfesionalesControler.php';
require_once 'controlador/UsuariosControler.php';
require_once 'helpers/AuthHelpers.php';
require_once 'controlador/EspecialidadesControler.php';
require_once 'controlador/homeControler.php';

$logueado = new AuthHelpers();
$permiso = new AuthHelpers();
$registro = new UsuariosControlador();
$profesionales = new ProfesionalesControlador();
$usuarios = new UsuariosControlador($logueado, $permiso);
$especialidades = new EspecialidadesControlador();
$home = new homeControlador();

// lee la acción
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'home'; // acción por defecto si no envían
}

$parametros = explode('/', $action);
switch ($parametros[0]) {
    case 'home':
        $home->mostrarHome();
        break;
    case 'doctores':
        $profesionales->mostrarProfesionales();
        break;
    case 'especialidades':
        $especialidades->mostrarEspecialidades();
        break;
    case 'usuarios':
        $registro->mostrarUsuarios();
        break;
    case 'logout': {
            $logueado->cerrarSession();
            $desde = $parametros[1];
            switch ($desde) {
                case 'doctores':
                    $profesionales->mostrarProfesionales();
                    break;
                case 'home':
                    $home->mostrarHome();
                    break;
                case 'especialidades':
                    $especialidades->mostrarEspecialidades();
                default:
                    $home->mostrarHome();
                    break;
            }
            break;
        }
    case 'loguearse': {
            $usuarios->login();
            $permiso->esAdministrador();
            var_dump($permiso);

            $desde = $parametros[1];
            switch ($desde) {
                case 'doctores':
                    $profesionales->mostrarProfesionales();
                    break;
                case 'home':
                    $home->mostrarHome();
                    break;
                case 'especialidades':
                    $especialidades->mostrarEspecialidades();
                    break;
                default:
                    echo "Usted no esta logueado";
                    break;
            }
            break;
        }
    case 'registrar': {
            $logueado->cerrarSession();
            $registro->mostarRegistro();
        }
        break;
    case 'registro': {
            $registro->registro();
            break;
        }
    case 'eliminar': {
            $desde = $parametros[1];
            switch ($desde) {
                case 'doctores':
                    $profesionales->eliminarProfesional($parametros[2]);
                    $profesionales->mostrarProfesionales();
                    break;
                case 'especialidades':
                    $especialidades->eliminarEspecialidad($parametros[2]);
                    $especialidades->mostrarEspecialidades();
                    break;
                default:
                case 'usuarios':
                    $usuarios->eliminarUsuario($parametros[2]);
                    $usuarios->mostrarUsuarios();
                    break;
            }
            break;
        }

    case 'actualizar': {
            $desde = $parametros[1];
            switch ($desde) {
                case 'doctores':
                    $profesionales->actualizarProfesional($parametros[2]);
                    break;
                case 'especialidades':
                    $especialidades->actualizarEspecialidad($parametros[2]);
                    break;
                case 'usuarios':
                    $usuarios->actualizarUsuario($parametros[2]);
                default:
                    break;
            }
            break;
        }

    case 'agregar_profesional':
        $profesionales->agregarProfesional();
        $profesionales->mostrarProfesionales();
        break;

    case 'agregar_especialidad':
        $especialidades->agregarEspecialidad();
        $especialidades->mostrarEspecialidades();
        break;

    case 'modificar': {
            $desde = $parametros[1];
            switch ($desde) {
                case 'doctores':
                    $profesionales->obtenerDatosProfesional($parametros[2]);
                    break;
                case 'especialidades':
                    $especialidades->obtenerDatosEspecialidad($parametros[2]);
                    break;
                case 'usuarios':
                    $usuarios->obtenerDatosUsuario($parametros[2]);
                default:
                    break;
            }
            break;
        }
    case 'perfil': {
            $profesionales->obtenerPerfil($parametros[1]);
            break;
        }
    default:
        echo ('Ud. eligio ' . $action);
        break;
}
