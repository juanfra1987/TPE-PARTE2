<?php
require_once('modelo/ComentarioModel.php');
require_once('api/ApiView.php');

class ApiComentarioController
{
    private $model;
    private $data;

    public function __construct()
    {
        $this->model = new ComentarioModel();
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input");
    }

    private function auth()
    {
        $user = $_SERVER['PHP_AUTH_USER'];
        $pass = $_SERVER['PHP_AUTH_PW'];
        return (($user == 'prueba@gmail.com') &&
            ($pass == '12345'));
    }

    function obtenerComentarios($params = [])
    {
        if (!empty($params)) {
            $id = $params[':id'];
            $comentarios = $this->model->obtenerComentarios($id);
            $this->view->response($comentarios, "200");
        } else {
            $this->view->response([], "403");
        }
    }

    function crearTarea()
    {
        $datos = $this->getData();
        $titulo = $datos->titulo;
        $descripcion = $datos->descripcion;
        $prioridad = $datos->prioridad;

        $this->model->registrar($titulo, $descripcion, $prioridad);

        $this->view->response("agregado satisfactoriamente", "200");
    }

    function getData()
    {
        return json_decode($this->data);
    }
}