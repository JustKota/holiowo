<?php
//Samuel Velasquez, Santiago amaya , victor patiño
$dbname='postgres';
$host='localhost';
$user='postgres'; 
$password='12345'; 
$port='5432';

try {
    $conn=new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
   
    

} catch (PDOException $th) {
    echo $th;
}

?>