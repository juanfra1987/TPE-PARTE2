<?php

require_once 'modelo/Model.php';

class UsuariosModel extends Model
{

    function obtenerUsuarioPorNombre($nombre)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * FROM usuarios WHERE usuario=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$nombre]);
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }


    function obtenerUsuarios()
    {
        $conexion = $this->getConexion();
        $peticion = 'select * FROM usuarios';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuarios;
    }
}
