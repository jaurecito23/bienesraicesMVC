<?php

            define("TEMPLATES_URL",__DIR__ . "/templates");
            define("FUNCIONES_URL",__DIR__ . "funciones.php");
            define("CARPETA_IMAGENES",$_SERVER['DOCUMENT_ROOT']."bienesraicesMVC/public/imagenes/");

function incluírTemplate(string $nombre, bool $inicio = false){

    include TEMPLATES_URL . "/${nombre}.php";

}

function estaAutenticado()  {

    session_start();


    if(!$_SESSION['login']){

      header("Location: /bienesraices");

    }


}


function debuguear($var){
     echo "<pre>";
    var_dump($var);
     echo "</pre>";
     exit;
}

// EScapa el HTML

function san($html)
{
    $s = htmlspecialchars($html);
    return $s;

    // Validar tipo de contenido
}

function validarTipoContenido($tipo){

    $tipos = ['vendedor','propiedad'];
    return (in_array($tipo,$tipos));

}

//Musestra los mensajes

function mostrarNotifiicación($codigo){


$mensaje = "" ;

    switch($codigo){

        case 1:
            $mensaje = "Creado Correctamente";
            break;

        case 2:
            $mensaje = "Actualizado Correctamente";
            break;
        case 3:
            $mensaje = "Eliminado Correctamente";
            break;

            default:
            $mensaje = false;
            break;

    }

    return $mensaje;


}

function validarORedicrecionar($url){

    $id = buscarQueryString("id");
    $id = filter_var($id ,FILTER_VALIDATE_INT);

        if(!$id){

            header("Location: ${url}");

        }

        return $id;



}

function buscarQueryString($var){

    $var = "?".$var. "=";
    $resultado = explode("${var}",$_SERVER['REQUEST_URI'])[1] ?? NULL;

    if($resultado !== NULL){

        return intval($resultado);


    }else{

        return $resultado;

    }


}
