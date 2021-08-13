<?php
if(!isset($_SESSION)){

	session_start();
}

$auth = $_SESSION["login"] ?? false;

    if(!isset($inicio)){


        $inicio = false;

    }


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bienes Raíces</title>
        <link rel="stylesheet" href='/bienesraicesMVC/public/build/css/app.css'>

        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

    </head>
    <body>
        <header class="header <?php  echo $inicio?'inicio':'';?>">
            <!--<?php // echo $inicio?'inicio':'';?>-->
            <div class="contenedor contenido-header">

                <div class="barra">

                    <a href="index.php">
                        <img src="/bienesraicesMVC/public/build/img/logo.svg" alt="logotipo-bienesraíces">
                    </a>

                    <div class="mobile-menu">

                        <img src="/bienesraicesMVC/public/build/img/barras.svg" alt="Menu Respponsive">

                    </div>
                    <div class="derecha">
                        <img class="dark-move-boton" src="/bienesraicesMVC/public/build/img/dark-mode.svg" alt="boton dark-move">

                        <nav data-cy="navegacion-header" class="navegacion">
                            <a href="nosotros">Nosotros</a>
                            <a href="propiedades">Propiedades</a>
                            <a href="blog">Blog</a>
                            <a href="contacto">Contacto</a>
                            <?php if($auth):?>

                            <a href="/bienesraicesMVC/public/logout">Cerrar Sesion</a>

                            <?php  endif ?>
                        </nav>

                    </div>


                </div>
                <!--barra-->


                <?php

							if($inicio){

						 	echo"<h1 data-cy='heading-sitio'>Venta de Casas y Departamentos Exclusivos de Lujo</h1>";

						 }

						?>

            </div>
        </header>


        <?php echo $contenido;?>


        <footer class=" footer">
            <div class="contenedor contenedor-footer">

                <nav data-cy="navegacion-footer" class="navegacion">
                    <a href="nosotros">Nosotros</a>
                    <a href="propiedades">Propiedades</a>
                    <a href="blog">Blog</a>
                    <a href="contacto">Contacto</a>
                </nav>

            </div>

            <p data-cy="copyright" class="copyright"> Todos los derechos reservados <?php echo date("Y");?> &copy; </p>
        </footer>

        <script src="/bienesraicesMVC/public/build/js/bundle.min.js"> </script>

    </body>
</html>