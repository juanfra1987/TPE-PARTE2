<?php

require_once 'modelo/Model.php';

class PermisosModel extends Model{
    /**
     * Recupera los profesiones, especialidades, y profecionales por especialidad desde la base de datos
     */

    function obtenerPermiso($id)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from permiso WHERE id?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $permiso = $sentencia->fetch(PDO::FETCH_OBJ);
        return $permiso;
    }


    function consultarPermisos()
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from permiso ORDER BY id DESC';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $permiso = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $permiso;
        }
    }