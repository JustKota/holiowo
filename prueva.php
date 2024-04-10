<?php

function conection(){



$dbname='postgres';
$host='localhost';
$user='postgres'; 
$password='12345'; 
$port=5432;

$conn=pg_connect("host=$host;dbname=$dbname;port=$port;user=$user;password=$password"); 

if(!$conn) {
    die("error en la coneccion");
}
return $conn;
}
?>