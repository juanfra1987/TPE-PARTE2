<?php

require_once 'modelo/Model.php';

class ComentarioModel extends Model
{

    function obtenerComentarios($id)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from comentario WHERE id_profesional_fk = ?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $comentarios = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $comentarios;
    }

    function eliminarComentario($id){
        $conexion = $this->getConexion();
        $peticion = "DELETE FROM comentario WHERE id = ?";
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
    }      

    function comentar($detalle,$puntaje,$idUsuario,$idProf)
    {
        $conexion = $this->getConexion();
        var_dump($detalle,$puntaje,$idUsuario,$idProf);
        $peticion = 'INSERT INTO comentario (detalle, puntaje, id_usuarios_fk, id_profesional_fk) 
        VALUES (?,?,?,?)';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$detalle, $puntaje, $idUsuario, $idProf]);

    }
}
