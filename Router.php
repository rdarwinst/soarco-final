<?php

namespace MVC;

class Router
{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn)
    {
        $this->rutasGET[$url] = $fn;
    }
    public function post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $auth = $_SESSION["login"] ?? null;
        // Arreglo de rutas protegidas
        $rutas_protegidas = ['/admin', '/proyectos/crear', '/proyectos/actualizar', '/proyectos/eliminar', '/imagenes/subir', '/testimonios/eliminar', '/equipo/crear', '/equipo/actualizar', '/equipo/eliminar'];

        // $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];


        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        // Proteger rutas
        if (in_array($urlActual, $rutas_protegidas) && !$auth) {
            header('Location: /');
        }

        if ($fn) {
            // La URL existe
            call_user_func($fn, $this);
        } else {
            // La URL No existe
            echo "Página No Encontrada.";
        }
    }

    /* Mostrar Vista */
    public function render($view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . "/views/{$view}.php";

        $contenido = ob_get_clean();

        include __DIR__ . "/views/layout.php";
    }
}
