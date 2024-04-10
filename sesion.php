<?php

require 'conexcion_postgres.php';
session_start();
$user=$_POST['user'];
$clave=$_POST['pass'];

$query="select * from usuario where usuario='$usuario' and contrasena='$clave'";
$consulta=pg_query($conexion,$query);
$cantidad=pg_num_rows($consulta);
if ($cantidad> 0) {
    $_SESSION['nombre_usuario']=$usuario;
    header('location: ingreso.php');
} else {
    echo'';
}

$sql = "SELECT * FROM usuario WHERE username = :username AND password = :password";