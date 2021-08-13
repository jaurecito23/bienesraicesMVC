<?php

    namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

        public static function index(Router $router){
            $propiedades = Propiedad::get(3);
            $inicio = true;
            $router->render('paginas/index',[

                'propiedades'=>$propiedades,
                'inicio'=>$inicio

            ]);

        }
        public static function nosotros(Router $router){

            $router->render("paginas/nosotros");

        }

        public static function propiedades(Router $router){

            $propiedades = Propiedad::all();

            $router->render("paginas/propiedades",[

                'propiedades'=>$propiedades

            ]);


        }
        public static function propiedad(Router $router){




            $id = \validarORedicrecionar("propiedades");

            $propiedad = Propiedad::find($id);

            $router->render("paginas/propiedad",[

                "propiedad"=>$propiedad

            ]);


        }
        public static function blog(Router $router){

            $router->render("paginas/blog");


        }
        public static function entrada(Router $router){

          $router->render("paginas/entrada");

        }
        public static function contacto(Router $router){

            $mensaje = null;

            if($_SERVER['REQUEST_METHOD'] === "POST"){


                $respuestas = $_POST["contacto"];


              // Crear instancia de php mailer

              $mail = new PHPMailer();


              // Protocolo para envio de emails
                // Connfigurar SMTP



                //Protocolo
                $mail->isSMTP();
                //Host
                $mail->Host ="smtp.mailtrap.io";
                //mail
                $mail->SMTPAuth = true;
                //Username
                $mail->Username = "6fa2ceedbbc110";
                //Password
                $mail->Password = "9388c78f5fca38";
                //Encription (transport layer security) vs (secure socket layer)
                $mail->SMTPSecure="tls";
                // Puerto
                $mail->Port = 2525;

                //Configurar Contenido del email

                //Origen
                //Quien envia
                $mail->setFrom("admin@bienesraices.com");

                //Destino
                //A que mail va a llegar
                $mail->addAddress("admin@bienesraices.com","BienesRaices.com");

                //Asunto
                $mail->Subject = "Tienes un nuevo Mensaje";

                //Habilitar HTML

                $mail-> isHTML(true);
                $mail->CharSet = "UTF-8";

                //Definir el contenido


                $contenido = '<html>';
                $contenido .= "<p style='font-size: 3rem; color: red;'>Tienes un nuevo mensaje</p>";
                $contenido .= "<p> Nombre: ". $respuestas["nombre"] ."</p>";

                // Enviar de forma condicioal algunos campos

                if($respuestas['contacto']==="relfono"){
                    $contenido .= "<p>Eligio ser contactado por Telefono<p>";
                    $contenido .= "<p> Telefono: ". $respuestas["telefono"] ."</p>";
                    $contenido .= "<p> Fecha: ". $respuestas["fecha"] ."</p>";
                    $contenido .= "<p> Hora: ". $respuestas["hora"] ."</p>";

                }else{

                    $contenido .= "<p>Eligio ser contactado por Email<p>";
                    $contenido .= "<p> Email: ". $respuestas["email"] ."</p>";
                }

                $contenido .= "<p> Mensaje: ". $respuestas["mensaje"] ."</p>";
                $contenido .= "<p> Tipo: ". $respuestas["tipo"] ."</p>";
                $contenido .= "<p> Precio o Presupuesto: $". $respuestas["precio"] ."</p>";





                $mail->Body = $contenido;
                $mail->AltBody = "Texto alternativo sin HTML";

                //Enviar el email
                if($mail->send()){

                    $mensaje = "Mensaje Enviado Correctamente";

                }else{

                    $mensaje = "El Mensaje no se Pudo Enviar";

                }



            }

            $router->render("paginas/contacto",[
                'mensaje'=>$mensaje
            ]);


        }


    }








?>