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
    function registrarUsuario($usuario, $password_usuario, $email,$id_permiso_fk)
    {
        $conexion = $this->getConexion();
        $peticion = 'INSERT INTO usuarios (usuario, password_usuario, email, id_permiso_fk) VALUES (?,?,?,?)';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$usuario, $password_usuario, $email,$id_permiso_fk]); 
    }

    function obtenerUsuarioNombre($nombre){
        $conexion = $this->getConexion();
        $peticion = 'select * FROM usuarios WHERE usuario=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute($nombre);
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuario;
    }
}
