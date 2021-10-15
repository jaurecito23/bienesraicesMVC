<?php

require "../includes/funciones/app.php";




$id_usuario = NULL;
session_start();


$id_usuario = $_SESSION["id_usuario"] ?? null;

$existeUsuario = false;

$resultado = false;

$productos = [];


if($id_usuario){
   $existeUsuario = true;

   $query = "SELECT * FROM favoritos WHERE id_usuario=$id_usuario";
   $resultado = mysqli_query($db, $query);

    while($favorito = mysqli_fetch_assoc($resultado)){

        $id_producto = $favorito["id_producto"];
        $query = "SELECT * FROM productos WHERE id = $id_producto LIMIT 1;";
        $producto = mysqli_query($db, $query);
        $producto = mysqli_fetch_assoc($producto);


        $query = "SELECT * FROM imagenes_producto WHERE id_producto = $id_producto LIMIT 1;";
        $imagenes = mysqli_query($db, $query);
        $imagen = mysqli_fetch_assoc($imagenes);
        $producto["imagen"] = $imagen["urls"];
        $productos[] = $producto;

    };



}



session_write_close();

echo json_encode(array(

    "existeUsuario"=>$existeUsuario,
    "resultado"=>$resultado,
    "productos"=>$productos

 ));




//echo $idCarrito;
