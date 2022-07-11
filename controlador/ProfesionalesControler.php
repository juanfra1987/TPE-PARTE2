<?php
require_once 'modelo/ProfesionalesModel.php';
require_once 'vista/ProfesionalesVista.php';
require_once 'modelo/EspecialidadesModel.php';
require_once 'helpers/AuthHelpers.php';

class ProfesionalesControlador
{
    private $vistaProf;
    private $modeloProf;
    private $modelEspec;
    private $logueado;

    function __construct()
    {
        $this->vistaProf = new ProfesionalesVista();
        $this->modeloProf = new ProfesionalesModel();
        $this->modelEspec = new EspecialidadesModel();
        $this->logueado = new AuthHelpers();
    }

    //muestra los profesionales
    function mostrarProfesionales()
    {
        $consultaEspec = $this->modelEspec->consultarEspecialidades();
        $consulta = $this->modeloProf->consultarProfesionalesEspec();
        $log = $this->logueado->estaLogueado();
        $this->vistaProf->renderDoctores($consulta, $log, $consultaEspec);
    }

    //levanta los datos del profesional el cual se desea modificar
    function obtenerDatosProfesional($id)
    {
        $consultaEspec = $this->modelEspec->consultarEspecialidades();
        $consultaProfesionales = $this->modeloProf->consultarProfesionalesEspec();
        $consulta = $this->modeloProf->obtenerProfesional($id);
        $log = $this->logueado->estaLogueado();
        $this->vistaProf->renderModificacionProf($consulta, $log, $consultaProfesionales, $consultaEspec);
    }

//agrega el profesional ingresado
    function agregarProfesional()
    {
        if (isset($_POST)) {
            $nombre = $_POST['nombre'];
            $dias_atencion = $_POST['dias_atencion'];
            $telefono = $_POST['telefono'];
            $idEspecialidad = $_POST['especialidad'];
            $this->modeloProf->agregarProfesional($nombre, $dias_atencion, $telefono, $idEspecialidad);
        }
    }

   
//actualiza el profesional que se modifico y renderiza
    function actualizarProfesional($id)
    {
        $nombre = $_POST['nombre'];
        $dias_atencion = $_POST['dias_atencion'];
        $telefono = $_POST['telefono'];
        $especialidad = $_POST['especialidad'];
        $this->modeloProf->modificarProfesional($nombre, $dias_atencion, $telefono, $especialidad, $id);
        $this->mostrarProfesionales();
    }

    //elimina el profesional seleccionado
    function eliminarProfesional($id)
    {
        $this->modeloProf->eliminarRegistro($id);
    }
    // obtiene el perfil del profesional por el Id
   
    function obtenerPerfil($id){
       
        $consulta = $this->modeloProf->consultarProfesionalEspec($id); 
        $this->vistaProf->renderMostrarPerfilProf($consulta);

    }


}
