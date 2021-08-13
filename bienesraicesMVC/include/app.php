<?php

// DIR pra que elija la ruta
require "funciones.php";

//Incluuyo Base de datos
require "config/database.php";

//Incluyo AUtoload de COmposer
require __DIR__ . "/../vendor/autoload.php";


$db = conectarDB();

use Model\ActiveRecord;


ActiveRecord::setDB($db);

// // Importar clase a travez de namespaces
//  use Intervention\Image\ImageManagerStatic as Image;






