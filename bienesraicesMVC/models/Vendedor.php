<?php

    namespace Model;


    class Vendedor extends ActiveRecord {

         protected static $tabla = "vendedores";

          protected static $columnasDB = ['id','nombre','apellido','telefono'];

              // Variables de base de datos
            public $id;
            public $nombre;
            public $apellido;
            public $telefono;


                // Constructor
            public function __construct($args = [])
            {
                $this->id= $args['id'] ?? NULL;
                $this->nombre = $args['nombre']  ?? "";
                $this->apellido = $args['apellido'] ?? "";
                $this->telefono= $args['telefono'] ?? "";

            }

              public function validar(){
                  if (!$this->nombre) {
                      self::$errores[] = "El Nombre es obligatorio";
                  }
                  if (!$this->apellido) {
                      self::$errores[] = "El apellido es obligatorio ";
                  }
                  if (!$this->telefono) {
                      self::$errores[] = "El telefono es obligatorio";
                  }
                  // Validar sea numero
                    //Preg_match Buscar un patron
                    //Divide por partes

                  $correo = "correo@correo.com";

                  if(!preg_match('/[0-9]{9}/',$this->telefono)){

                        self::$errores[] = "Formato no Válido de Telefono";

                  }

                  return self::$errores;
              }




    }


?>