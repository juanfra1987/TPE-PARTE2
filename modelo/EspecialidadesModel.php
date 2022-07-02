<?php

require_once 'modelo/Model.php';

class EspecialidadesModel extends Model{
    /**
     * Recupera los profesiones, especialidades, y profecionales por especialidad desde la base de datos
     */

    function obtenerEspecialidad($id_espec)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from especialidad WHERE id_espec=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id_espec]);
        $especialidad = $sentencia->fetch(PDO::FETCH_OBJ);
        return $especialidad;
    }

    function agregarEspecialidad($nombre)
    {
        $conexion = $this->getConexion();
        $peticion = 'INSERT INTO especialidad (nombre_espec) VALUES (?)';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$nombre]);
    }


    function consultarEspecialidades()
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from especialidad ORDER BY nombre_espec DESC';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $especialidades = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $especialidades;
    }

    function eliminarEspecialidad($id)
    {
        $conexion = $this->getConexion();
        $sql = "DELETE FROM especialidad WHERE id_espec = ?";
        $sentencia = $conexion->prepare($sql);
        $sentencia->execute([$id]);
    } 

    function modificarEspecialidad($nombre,$id)
    {
        $conexion = $this->getConexion();
        $peticion = 'UPDATE especialidad SET nombre_espec=? WHERE id_espec=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$nombre,$id]);
    }

}