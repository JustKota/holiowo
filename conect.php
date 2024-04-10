<?php

$host='localhost';
$port='5432';
$dbname='ucompensar';
$user='postgres';
$password='12345';
$hola=$_POST['nombres'];


try {
    $con=new PDO("pgsql:host=$host; port=$port; dbname=$dbname", $user, $password);
    //$con=new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);

    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "ok";
    $consultasql="insert into estudiante (nombre) values('$hola')";
    $consultasql2="select * from estudiante";
    $prepare3=$con ->prepare($consultasql2);
    $prepare3->execute();
    $prepare4=$prepare3->fetchAll(PDO::FETCH_ASSOC);


    $prepare = $con->prepare($consultasql);
    $prepare->execute();
    $prepare2 = $prepare->fetchAll(PDO::FETCH_ASSOC);

    

    print_r($prepare4);
} catch (PDOException $a) {
    echo $a;
}

?>