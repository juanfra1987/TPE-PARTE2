<?php

require_once 'modelo/Model.php';

class ComentarioModel extends Model{
   
    function obtenerComentarios($id){
        $conexion = $this->getConexion();
        var_dump($id);
        die;
        $peticion = 'select * from comentario WHERE id_profesional_fk = ?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $comentarios;
    }

    function comentar($detalle, $puntaje) {

        $sql = "INSERT INTO tarea (detalle, puntaje) 
        VALUES (?,?)";

        $sentencia = $this->db->prepare($sql);
        $sentencia->execute([$detalle, $puntaje]);

    }  
}