<?php
if(isset($_GET['numero'])) {
    $numero = $_GET['numero'];
   
}
    $letra_inicio = chr(96 + $numero);
    $abecedario = range($letra_inicio, 'z');
    
    echo "" . implode(" || ", $abecedario) . "</p>";




?>