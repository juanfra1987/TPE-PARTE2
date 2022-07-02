<?php
require_once 'modelo/EspecialidadesModel.php';
require_once 'vista/EspecialidadesVista.php';

class EspecialidadesControlador
{
    private $vistaEspec;
    private $modeloEspec;
    private $logueado;

    function __construct()
    {
        $this->vistaEspec = new EspecialidadesVista();
        $this->modeloEspec = new EspecialidadesModel();
        $this->logueado = new AuthHelpers();
    }

    //levanta los datos de la especialidad el cual se desea modificar
    function obtenerDatosEspecialidad($id)
    {
        $consultaEspec = $this->modeloEspec->consultarEspecialidades();
        $consulta = $this->modeloEspec->obtenerEspecialidad($id);
        $log = $this->logueado->estaLogueado();
        $this->vistaEspec->renderModificacionEspec($consulta, $log, $consultaEspec);
    }

    //añade la especialidad ingresada
    function agregarEspecialidad()
    {
        if (isset($_POST)) {
            $nombre = $_POST['nombre'];
            $this->modeloEspec->agregarEspecialidad($nombre);
        }
    }

//muestra todas las especialidades
    function mostrarEspecialidades()
    {
        $consulta = $this->modeloEspec->consultarEspecialidades();
        $log = $this->logueado->estaLogueado();
        $this->vistaEspec->renderEspecialidades($consulta, $log);
    }

    //actualiza la esepcialidad que se modifico y renderiza
    function actualizarEspecialidad($id)
    {
        $nombre = $_POST['nombre'];
        $this->modeloEspec->modificarEspecialidad($nombre, $id);
        $this->mostrarEspecialidades();
    }

    //elimina la especialidad que se indico
    function eliminarEspecialidad($id)
    {
        $this->modeloEspec->eliminarEspecialidad($id);
    }
}
