<?php
$arr=[11,55,88,445];
$arr1=["a","t","y"];
//Las posiciones del arr se cuentan de 0,1,2,3...

//impresion de array
echo $arr[0];
echo"<br>";
echo $arr[1];
echo"<br>" ;
print_r($arr1);

//for
for ($i=0; $i < count($arr); $i++){
    echo $arr[$i]." "."||";
}
//Ruta para el xampp:C:\xampp\htdocs\proyectos
?>
