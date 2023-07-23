<?php
    include_once '../../includes/funciones.php';
    if(validarNIT($_GET['nit'])){
        echo "si es valido";
    }else{
        
        echo "no es valido";
    }
