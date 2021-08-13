<?php

namespace Model;


class ActiveRecord {


                   // BAse de datos

               // Static no se ejecuta en todos los objetos creados , es decir no crea una nueva instancia
               // No forma parte del cosntructor
               // No se modfifica

            protected static $db;

            //Colujmnas de la base de datos
            protected static $columnasDB = [];

            protected static $tabla = "";

            // ERRRORES VALIDACION
            // Protected unicamente en la clase , solo la clase dice si es valido
            // Static no requiere instanciar

            protected static $errores = [];




                        // Definir la cooneccion a la base datos
               public static function setDB($database){
                // Self hace referencia a los atribuutos staticos de una misma clase
                self::$db = $database;
            }




               //Metodo Guardar
                public function guardar(){

                    if(!is_null($this->id)){

                        //Actualizar
                            $this->actualizar();

                    }else{

                        //Crear Nuevo registro
                            $this->crear();
                    }

                }



               public function crear(){

                //Santizar los datos

                $atributos =  $this->sanitizarDatos();

                // Crear un string a partir de un arreglo
                // $string = join(', ',array_keys($atributos)); A las llaves
                // $string = join(', ',array_values($atributos)); A los valores
                // debuguear($string);

                // Insertar en la base de datos
                    // $query.= Para concatenar con la siguiente linea

                        $query = "INSERT INTO " . static::$tabla . " ( ";
                        $query.=join(', ',array_keys($atributos));
                        $query.=" ) VALUES (' ";
                        $query.=join("', '",array_values($atributos));
                        $query.= " ')";


                        //Insertando en la base de dattoss:::
                        $resultado =  self::$db->query($query);
                            if ($resultado) {
                            //Redireccionar al usuario // QUERY STRINGS para comunicar webs
                           header('Location: /bienesraicesMVC/public/propiedades/admin?resultado=1');
                        }


                    }

                        public function actualizar(){

                          $atributos = $this->sanitizarDatos();

                          $valores = [];
                          foreach ($atributos as $key => $value) {
                              $valores[] = "{$key}='{$value}'";
                            }


                            $query = " UPDATE " .static::$tabla . " SET ";
                            $query .= join(',',$valores);
                            $query .= " WHERE id = '" . self::$db->escape_string($this->id). "' ";
                            $query .= " LIMIT 1 ";


                          $resultado = self::$db->query($query);

                            if ($resultado) {
                            //Redireccionar al usuario // QUERY STRINGS
                            header('Location: /bienesraicesMVC/public/propiedades/admin?resultado=2');
                        }

                          return $resultado;

                        }


                        // Eliminar una propiedad

                        public function eliminar(){

                            $query = "DELETE FROM " . static::$tabla ." WHERE id = ".self::$db->escape_string($this->id) . " LIMIT 1";

                            $resultado = self::$db->query($query);
                            $this->borrarImagen();

                            if($resultado){
									header('location: /bienesraicesMVC/public/propiedades/admin?resultado=3');
									}

                        }






                public function atributos(){
                    $atributos = [];
                    foreach( static::$columnasDB as $columna){

                            if($columna === 'id') continue; //Ignora la columna de ID
                        //Mapear crea un arreglo con los elementos a insertar en la DB
                            $atributos[$columna] = $this->$columna;
                    }
                    return $atributos;
                }

               public function sanitizarDatos(){

              $atributos = $this->atributos();
                $sanitizado = [];

                foreach ($atributos as $key => $value) {
                    $sanitizado[$key] = self::$db->escape_string($value);
                }

               return $sanitizado;

               }

                // Subida de archivos

               public function setImagen($imagen){
                    // Elimina la imagen previa

                   if(!is_null($this->id)){
                        $this->borrarImagen();
                   }

                   if($imagen){

                    $this->imagen = $imagen;

                   }
               }


               // Borrar Imagen

               public function borrarImagen(){
                   $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
                 fclose (CARPETA_IMAGENES); /// USA ESTE PUTO CODIGO
                   if ($existeArchivo) {
                       // Eliminar unlink
                       unlink(CARPETA_IMAGENES . $this->imagen);
                   }
               }

               // Validacion (Retorna los errores)

               public static function getErrores(){


                    return static::$errores;

               }


               public function validar(){

                        static::$errores = []; //para que se limpie el arreglo
                        return static::$errores;

               }

               // Lista todas las propiedades

               public static function all(){

                    // self hace referencia a esta clase
                    // static va a hacer referencia al atributo de la clase que se este utilizando el metodo

                $query = "SELECT * FROM ". static::$tabla;

                $resultado =  self::consultarSQL($query);

                return $resultado;
               }


               // Obtiene un deterinado numero de registrpços

               public static function get($cantidad){

                    $query = "SELECT * FROM ".static::$tabla." LIMIT " . $cantidad;
                    $resultado = self::consultarSQL($query);
                    return $resultado;

               }




               // Busca un registro por su id

               public static function find($id){

                    $query = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}";

                    $resultado = self::consultarSQL($query);


                  return array_shift($resultado); // Array shif retorna el primer elemento de un arreglo

               }

                // Para consultar el sql
            public static function consultarSQL($query){

                    // Consultar la base de datos
                        $resultado = self::$db->query($query);


                    // Iterar los resultados

                       $array = [];
                        while($registro = $resultado -> fetch_assoc()){

                            $array[] = static::crearObjeto($registro);


                        }




                    // Liberar la memoria

                        $resultado->free();

                    // Retornar los resultados
                           return $array;

            }

                // Crear un nuevo objeto se utiliza xq active record necesita objetos

            protected static function crearObjeto($registro){

                $objeto = new static; // Crea nuevo objeto de la clase actual
                                // static para que haga referencia a la clase enm que se utiliza



                foreach($registro as $key => $value){

                    if(property_exists($objeto, $key )){  // property_exist tomma un objeto y se fija si tiene ciertas propiedades

                            $objeto->$key = $value; // Si existe entonces , le agrega al objeto en la propiedad existente el valor del  ...registro en esa propiedad
                    }
                }

                return $objeto;

            }

            // Sincorniza el objeto en memoria con los cambios realizados
                        // por el usuario

                        public function sincronizar($args = []){

                          foreach ($args as $key => $value) {
                              if(property_exists($this,$key) && !is_null($value)){

                                    $this->$key = $value;

                              }
                          }

                        }



}



?>