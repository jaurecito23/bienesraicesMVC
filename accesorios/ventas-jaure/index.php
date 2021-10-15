

<?php
    // Enlazar el app
     require_once __DIR__ . "/../includes/funciones/app.php";

     use Controllers\PaginasController;
     use MVC\Router;
     use App\Producto;


session_start();




$router = new Router();

//PropiedadController::class Trae el namespace donde se encuentra

//AdministradorZONA PRIVADA


//GET

$router->get("/",[PaginasController::class,"home"]);
$router->get("/producto",[PaginasController::class,"producto"]);
$router->get("/tienda",[PaginasController::class,"tienda"]);
$router->get("/pagar",[PaginasController::class,"pagar"]);
$router->get("/crearcuenta",[PaginasController::class,"crearcuenta"]);
$router->get("/cerrarsession",[PaginasController::class,"cerrarsession"]);
$router->get("/micuenta",[PaginasController::class,"micuenta"]);
$router->get("/ingresar",[PaginasController::class,"ingresar"]);

$router->get("/cambiarcontrasena",[PaginasController::class,"cambiarcontrasena"]);


// POST
$router->post("/cambiarcontrasena",[PaginasController::class,"cambiarcontrasena"]);
$router->post("/crearcuenta",[PaginasController::class,"crearcuenta"]);
$router->post("/ingresar",[PaginasController::class,"ingresar"]);

$router->comprobarRutas();