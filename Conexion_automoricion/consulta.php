<?php

//Samuel Velasquez, Santiago amaya , victor patiño

require ("conexion.php");
$sql="SELECT * from holi";
    $ps=$conn->prepare($sql);
    $st= $ps->execute();
    $rs= $ps->fetchAll(PDO::FETCH_ASSOC);
   

    foreach($rs as $row) {
        print $row["id"]. ";".$row["nombre"].";".$row["contrasena"]."\n";
    }
?>