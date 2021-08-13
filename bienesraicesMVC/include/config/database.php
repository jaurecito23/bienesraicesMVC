<?php


function conectarDB() : mysqli {

  // Forma orientada aobjetos de hacer la coneccion

  $db = new mysqli("localhost", "root", "root", "bienes_raices");

if(!$db){

    echo "No se Conecto";
    exit;
}

return $db;

}



?>