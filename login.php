<?php

$dbname='postgres';
$host='localhost';
$user='postgres'; 
$password='12345'; 
$port='5432';

try {
    $conn=new PDO("pgsql:host=$host;dbname=$dbname;port=$port;user=$user;password=$password"); 
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo"holi";

    $sql="SELECT * from holi";
    $ps=$conn->prepare($sql);
    $st= $ps->execute();
    $rs= $ps->fetchAll(PDO::FETCH_ASSOC);
    print_r($rs);

} catch (PDOException $th) {
    echo $th;
}
