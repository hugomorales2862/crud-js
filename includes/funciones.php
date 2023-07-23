<?php

function validarNIT($nit){    
    $nit = $_GET['nit'];
    $tamanio = strlen($nit);
    $validador = $nit[$tamanio-1];
    $validador = strtolower( $validador ) == 'k' ? 10 : $validador;
    $posicion = 2;
    $suma = 0;
    for($i = $tamanio -  2; $i >= 0 ; $i--){

        $suma += $nit[$i] * $posicion;
        // echo $nit[$i] . "pos: " . $posicion;
        // echo "<br>";
        $posicion++;
    }
    $residuo = $suma % 11;
    $resta = 11 - $residuo;
    $residuo2 = $resta % 11;
    return $residuo2 == $validador;
}