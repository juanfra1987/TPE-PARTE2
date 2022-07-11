<?php

require_once 'modelo/Model.php';

class ProfesionalesModel extends Model
{
    
    function obtenerProfesional($id_prof)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from profesionales WHERE id_prof=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id_prof]);
        $profesional = $sentencia->fetch(PDO::FETCH_OBJ);
        return $profesional;
    }

    function agregarProfesional($nombre, $dias_atencion, $telefono, $idEspecialidad)
    {
        $conexion = $this->getConexion();
        $peticion = 'INSERT INTO profesionales (nombre_prof, dias_atencion, telefono, id_especialidad) VALUES (?,?,?,?)';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$nombre, $dias_atencion, $telefono, $idEspecialidad]);
    }

    function modificarProfesional($nombre,$dias_atencion,$telefono,$especialidad,$id)
    {
        $conexion = $this->getConexion();
        $peticion = 'UPDATE profesionales SET nombre_prof=?,dias_atencion=?,telefono=?,id_especialidad=? WHERE id_prof=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$nombre,$dias_atencion,$telefono,$especialidad,$id]);
    }

    function consultarDoctores()
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from profesionales ORDER BY nombre_prof DESC';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $profesionales = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $profesionales;
    }

    function consultarProfesionalesEspec()
    {
        $conexion = $this->getConexion();
        $peticion = 'SELECT profesionales.id_especialidad, especialidad.nombre_espec, 
        profesionales.nombre_prof, profesionales.telefono, profesionales.dias_atencion, 
        profesionales.id_prof
        FROM profesionales
        INNER JOIN especialidad
        ON profesionales.id_especialidad=especialidad.id_espec
        ORDER BY profesionales.nombre_prof';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $profesionales_espec = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $profesionales_espec;
    }

    function eliminarRegistro($id){
        $conexion = $this->getConexion();
        $peticion = "DELETE FROM profesionales WHERE id_prof = ?";
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
    }  
    
    function consultarProfesionalEspec($id)
    {
        $conexion = $this->getConexion();
        $peticion = 'SELECT profesionales.id_especialidad, especialidad.nombre_espec, 
        profesionales.nombre_prof, profesionales.telefono, profesionales.dias_atencion, 
        profesionales.id_prof,profesionales.imagen
        FROM profesionales
        INNER JOIN especialidad
        ON profesionales.id_especialidad=especialidad.id_espec
        WHERE id_prof=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $profesional_espec = $sentencia->fetch(PDO::FETCH_OBJ);
        return $profesional_espec;
    }
}
