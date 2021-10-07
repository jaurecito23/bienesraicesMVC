<?php



function conectarDB():mysqli{

    //$db = new mysqli("localhost","c2300474_frutiya","KOrobo34gu","c2300474_frutiya");
    $db = new mysqli("localhost","root","root","auriculares_premium");
    if($db){

        return $db;

    }else{

        echo "Hubo un error en la coneccion";
        exit;
    }

}


?>