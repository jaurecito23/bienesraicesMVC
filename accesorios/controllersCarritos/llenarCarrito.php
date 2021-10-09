<?php

require "../includes/funciones/app.php";


use App\ProductoCarrito;

$idCarrito = NULL;
session_start();


// Verifica si existe carrito y sino lo crea

if(isset($_SESSION["idCarrito"])){

    $idCarrito = $_SESSION["idCarrito"];

}else{

    $idCarrito = ProductoCarrito::creandoCarrito();
    $_SESSION["idCarrito"] = $idCarrito;

 }

 // Obtienes los productos del carrito

$productos = ProductoCarrito::obtenerProductosCarrito($idCarrito);


 echo json_encode($productos);

//echo $idCarrito;
