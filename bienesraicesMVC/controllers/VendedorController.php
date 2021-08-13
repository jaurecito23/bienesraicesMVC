<?php

namespace Controllers;
use MVC\Router;
use Model\Vendedor;

class VendedorController
{
    public static function crear(Router $router)
    {
        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;


        if ($_SERVER['REQUEST_METHOD'] === "POST") {

                // Crea una nueva instancia

            $vendedor = new Vendedor($_POST['vendedor']);

            // Validar que no haya campos vacios

            $errores = $vendedor->validar();

            if (empty($errores)) {
                $vendedor->guardar();
            }
        }
                    $router->render("vendedores/crear", [

                        'errores' => $errores,
                        'vendedor'=>$vendedor

                    ]);
        }

        public static function actualizar(Router $router){

           $errores=Vendedor::getErrores();
           $id=\validarORedicrecionar("/bienesraicesMVC/public/propiedades/admin");
           //Obtener datos del vendedor
           $vendedor= Vendedor::find($id);




           if($_SERVER['REQUEST_METHOD'] ==="POST"){

            $args = $_POST["vendedor"];

                // Sincronizar objeto en memoria con lo actualizado

            $vendedor->sincronizar($args);

            $errores = $vendedor->validar();

                if(empty($errores)){

                    $vendedor->guardar();

                }

        }

            $router->render("vendedores/actualizar",[
                "errores"=>$errores,
                "vendedor"=>$vendedor,
                "id"=>$id
            ]);
        }

                 public static function eliminar(){


                        if($_SERVER["REQUEST_METHOD"]==="POST"){

                            // Valida el tipo
                                $tipo = $_POST['tipo'];

                            // Valida el ID
                            $id =$_POST['id'];
                            $id = filter_var($id,\FILTER_VALIDATE_INT);
                            if(isset($id)){

                                if(\validarTipoContenido($tipo)){

                                    $vendedor = Vendedor::find($id);
                                    $vendedor->eliminar();

                                }

                            }
                        }


                }
    }
