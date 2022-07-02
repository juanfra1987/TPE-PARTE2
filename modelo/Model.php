<?php
class Model{
 private $baseDeDatos;

 function getConexion() {
    return $this->baseDeDatos;
}

    function __construct() {
        $user = 'root';
        $pass = 'root';
        $dbname = 'consultorio';
        $host = 'localhost';
        $port = '3306';
        $this-> baseDeDatos = new PDO("mysql:host=$host:$port;dbname=$dbname", $user, $pass);
    }
}