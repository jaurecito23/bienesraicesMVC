<?php

    require "../includes/funciones/app.php";
    use App\Producto;


    $tipo = $_POST["tipo"];
    $id_categoria = $_POST["id_categoria"];
    $cantidad = $_POST["cantidad"];
    $id_ultimo = $_POST["id_ultimo"] ?? 6;
    $id_primero = $_POST["id_primero"] ?? 1;
    $aumentar = $_POST["aumentar"] ?? false;


    // echo json_encode(array(

    //     "id_ultimo"=>$id_ultimo

    // ));

    // return;

    $query = "";

    if($tipo == "descuentos"){

        $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id > $id_primero ORDER BY descuento DESC LIMIT $cantidad";

    }
    if($tipo == "precioSlider"){

        $minimo = $_POST["minimo"];
        $maximo = $_POST["maximo"];

        $query = "SELECT * FROM productos WHERE precio  BETWEEN $minimo AND $maximo ORDER BY descuento DESC LIMIT $cantidad";



    }

    if($tipo == "precio"){

        if($id_ultimo){

            $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id > $id_primero ORDER BY precio DESC LIMIT $cantidad";

        }

        $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria  ORDER BY precio DESC LIMIT $cantidad";
    }

    if($tipo == "cambiarPagina"){

        if($aumentar !== false){

            $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id > $id_ultimo  ORDER BY precio DESC LIMIT $cantidad";
            echo json_encode(array(

                "query"=>"jaja",



            ));

            return;

        }elseif($aumentar == false){

            echo json_encode(array(

                "query"=>$aumentar

            ));

            return;

            $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id < $id_primero ORDER BY precio DESC LIMIT $cantidad";
            echo json_encode(array(

                "query"=>$query

            ));

            return;

        }


    }

    if($tipo == "cantidad"){

        $ordenarPor = $_POST["ordenarPor"];

        if($ordenarPor == 0){

            $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id > $id_primero ORDER BY precio DESC LIMIT $cantidad";

        }else{

            $query = "SELECT * FROM productos WHERE id_categoria = $id_categoria AND id > $id_primero ORDER BY descuento DESC LIMIT $cantidad";

        }

    }
    if($tipo == "marca"){

        $ordenarPor = $_POST["ordenarPor"];
        $marca = $_POST["marca"];


        if($ordenarPor == 0){

            $query = "SELECT * FROM productos LEFT JOIN detalles_productos ON detalles_productos.marca = '$marca' ORDER BY productos.precio DESC LIMIT $cantidad;";

        }else{

            $query = "SELECT * FROM productos  LEFT JOIN detalles_productos ON detalles_productos.marca = '$marca' ORDER BY productos.descuento DESC LIMIT $cantidad";

        }

    }



    $resultado = Producto::consultarSQL($query);
   $imagenes = [];

   $primerProducto = true;

    foreach ($resultado as $producto) {


        if($primerProducto){

            $id_primero = $producto->id;
            $id_ultimo = $producto->id;
            $primerProducto = false;

        }else{

            if($producto->id > $id_ultimo){

                $id_ultimo = $producto->id;

            }

            if($producto->id < $id_primero){

                $id_primero = $producto->id;

            }

        }



       $imagenes[$producto->id] = $producto->obtenerImagenes();

   }


    $respuesta = array(

        "productos"=>$resultado,
        "imagenes"=>$imagenes,
        "id_ultimo"=>$id_ultimo,
        "id_primero"=>$id_primero

    );

    echo json_encode($respuesta);

?>