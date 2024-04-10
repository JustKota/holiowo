<?php
function burbuja($arreglo){
    $contar=count($arreglo);

    for ($i=0; $i <$contar ; $i++){
        for ($j=0; $j <$contar-$i-1 ; $j++){
            if ($arreglo[$j]>$arreglo[$j+1]){
                $temp=$arreglo[$j];
                $arreglo[$j]=$arreglo[$j+1];
                $arreglo[$j+1]=$temp;
            }
        }
    }
    return $arreglo;
}

$arreglo=array(78,45,1,2,456,78,24);
$ordenar=burbuja($arreglo);
foreach ($arreglo as $fila){
    echo $fila." ||";
}
?>