<?php

require_once 'modelo/Model.php';

class ComentarioModel extends Model{
   
    function obtenerComentarios($id){
        $conexion = $this->getConexion();
        $peticion = 'select * from comentario WHERE id_profesional_fk = ?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $comentarios;
    }
}