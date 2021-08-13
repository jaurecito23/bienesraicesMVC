<?php


namespace MVC;


class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function post($url,$fn){

        $this->rutasPOST[$url]= $fn;

    }

    public function get($url, $fn){

        $this->rutasGET[$url] = $fn;

    }


    public function comprobarRutas()
    {

        session_start();
        $auth = $_SESSION["login"] ?? NULL;

        //Arreglo de rutas protegidas...

        $rutas_protegidas = ['/propiedades/admin','propiedades/crear','propiedades/actualizar','propiedades/eliminar','vendedores/crear','vendedores/actualizar','vendedores/eliminar'];

        $url = $_GET['views'] ?? '';
        $urlActual = "/".$url;
        $metodo = $_SERVER['REQUEST_METHOD'];
        // var_dump($_GET['views']);
         //debuguear($urlActual);

        // $urlActual = $_SERVER['PATH_INFO'] ?? "/";




        $fn = null;
        if($metodo === "GET"){
            $fn = $this->rutasGET[$urlActual] ?? NULL;

        }else if($metodo === "POST"){

            $fn = $this->rutasPOST[$urlActual] ?? NULL;

        }


        //Proteger las rutas

        if(in_array($urlActual,$rutas_protegidas) && !$auth ){

            header("Location: /bienesraicesMVC/public");

        }


        // Si la url existe y tiene func
        if(isset($fn)){

            // Llama la funcion que tiene la variable
                // Fn contiene la referencia al controlador y la funcion
                // Mientras que this contiene la instancia d este proyecto del nnuevo router

            call_user_func($fn, $this);

        }else{

            echo "Pagina no encontrada";

        }



    }


    // Muestra una views renderiza
    // Pasa los datos por arreglo

    public function render($view,$datos = []){

        // ob_start() Inicia un almacenamiento en memoria

        foreach ($datos as $key => $value) {

            // Doble signo de dolar crea una variable con nombre igual a la llave
            // y valor igual al value
            $$key = $value;

        }

        ob_start();

        include __DIR__ . "/views/$view.php";

        // Get_clean Limpiamos la memoria $contenido almacena la view que le pasamos

        $contenido = \ob_get_clean();

        include __DIR__ . "/views/layout.php";

    }

}