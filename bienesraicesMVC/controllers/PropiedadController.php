<?php

    namespace Controllers;
    use MVC\Router;
    use Model\Propiedad;
    use Model\Vendedor;
    use Intervention\Image\ImageManagerStatic as Image;

    class PropiedadController {



        // Static no requiero crear un nuevo obbjeto o instancia
        // Router $router para traernos el pbjeto que ya existe
        public static function index(Router $router){

            $propiedades = Propiedad::all();
            $vendedores = Vendedor::all();
            // $resultado = $_GET['resultado'] ?? null;
            // \debuguear($_GET);

            $resultado = buscarQueryString("resultado");


           $router->render("propiedades/admin",[
            'propiedades'=>$propiedades,
            'resultado'=>$resultado,
            'vendedores'=>$vendedores

           ]);

        }

        public static function crear(Router $router){

            $propiedad = new Propiedad;
            $vendedores = Vendedor::all();
            $errores = Propiedad::getErrores();

                if($_SERVER['REQUEST_METHOD']==="POST"){

                    //Creamos un objeto con clase propiedad que toma el arreglo POST
              // Crea una nueva instanica
              $propiedad = new Propiedad($_POST['propiedad']);

                  // Genera un nombre  unico para la imagen
                  $nombreImagen = md5(uniqid(rand(),true)) . ".jpg";  // Toma una entrada y la convierte

                      // Si existe el archivo de imagen hace los siguiente
                  if($_FILES['propiedad']['tmp_name']['imagen']){
                      // Realizar REsize a la imagen con interventio
                      // fit() resize mas crop ,,, grande o chica
                   $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                  // Setear Imagen
                      $propiedad->setImagen($nombreImagen);
                   }

              $errores = $propiedad->validar();


              // revisar que el arreglo de errores este vacio
              if (empty($errores)) {

                      // Crear la carpeta para subir imagenes
                      if(!is_dir(CARPETA_IMAGENES)){
                          mkdir(CARPETA_IMAGENES);
                      }

                  //Subir Imagen
                  // Guarda la imagen en el servidor
                  $image->save(CARPETA_IMAGENES . $nombreImagen);

                      // Guarda en la base de datos
                       // Creamos una funcion guardar()
                      $resultado = $propiedad->guardar();

                      //mensaje de exito o error


                      }



            }


            $router->render("propiedades/crear",[

                'propiedad'=>$propiedad,
                'vendedores'=>$vendedores,
                'errores'=>$errores

            ]);



        }



            public static function actualizar(Router $router){
                $id = validarORedicrecionar("/bienesraicesMVC/public/propiedades/admin");

                $propiedad = Propiedad::find($id);
                $errores = Propiedad::getErrores();
                $vendedores = Vendedor::all();


                if ($_SERVER["REQUEST_METHOD"] === "POST") {

                    // asignar los atributos
                    $args = $_POST['propiedad'];
                $propiedad->sincronizar($args);

                // Validacion
                $errores = $propiedad->validar();

                $image = "";


                // Subida de archivos
                    if($_FILES['propiedad']['tmp_name']['imagen']){



                        $nombreImagen = md5(uniqid(rand(),true)).".jpg";

                        $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);


                        $propiedad->setImagen($nombreImagen);

                    }



                // revisar que el arreglo de errores este vacio
                if (empty($errores)) {

                     if ($_FILES['propiedad']['tmp_name']['imagen']) {
                         //Almacenar imagen en servidor
                         $image->save(CARPETA_IMAGENES . $nombreImagen);
                         // Insertar en la base de datos
                        }
                        $propiedad->guardar();
                    }


               }

                $router->render("propiedades/actualizar", [

                    'propiedad'=>$propiedad,
                    'errores'=>$errores,
                    'vendedores'=>$vendedores


                ]);


            }




                            public static function eliminar(){

                                if ($_SERVER["REQUEST_METHOD"] === "POST") {
                                    // Validar id
                                    $id = filter_var(intval($_POST['id']),FILTER_VALIDATE_INT);

                                    //Eliminar la Propiedad
                                    if($id){
                                        $tipo = $_POST['tipo'];
                                        if(validarTipoContenido($tipo)){
                                                if($_POST['tipo']==="propiedad"){
                                            $propiedad = Propiedad::find($id);
                                            $propiedad->eliminar();

                                        }
                                        }
                                    }
                                }
                        }

        }