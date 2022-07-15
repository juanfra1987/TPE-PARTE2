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
    function obtenerUsuario($id)
    {
        $conexion = $this->getConexion();
        $peticion = 'select * from usuarios WHERE id_usuario=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
        $usuario = $sentencia->fetch(PDO::FETCH_OBJ);
        return $usuario;
    }

    function obtenerUsuarios()
    {
        $conexion = $this->getConexion();
        $peticion = 'select * FROM usuarios';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $usuarios = $sentencia->fetchAll(PDO::FETCH_NAMED);
        return $usuarios;
    }
    function registrarUsuario($usuario,$passhash, $email, $id_permiso_fk)
    {
        $conexion = $this->getConexion();
        $peticion = 'INSERT INTO usuarios (usuario, password_usuario, email, id_permiso_fk) VALUES (?,?,?,?)';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$usuario,$passhash, $email, $id_permiso_fk]);
        return $conexion->lastInsertId();
    }

    function obtenerUsuarioNombre($nombre){
        $conexion = $this->getConexion();
        $peticion = 'select * FROM usuarios WHERE usuario=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute($nombre);
        $usuario = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $usuario;
    }
    function modificarUsuario($id,$usuario,$id_permiso_fk)
    {
        $conexion = $this->getConexion();
        $peticion = 'UPDATE usuarios SET usuario=?,id_permiso_fk=? WHERE id_usuario=?';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$usuario,$id_permiso_fk,$id]);
    }
    function eliminarRegistro($id){
        $conexion = $this->getConexion();
        $peticion = "DELETE FROM usuarios WHERE id_usuario = ?";
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute([$id]);
    }      
    function consultarUsuarioPermiso()
    {
        $conexion = $this->getConexion();
        $peticion = 'SELECT usuarios.id_permiso_fk,permiso.tipo,usuarios.id_usuario
        FROM usuarios
        INNER JOIN permiso
        ON usuarios.id_permiso_fk=permiso.id
        ORDER BY usuarios.id_usuario';
        $sentencia = $conexion->prepare($peticion);
        $sentencia->execute();
        $usuarios_permisos = $sentencia->fetch(PDO::FETCH_NAMED);
        return $usuarios_permisos;
    }
}
