<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Equipo;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;
use Model\Testimonial;

class ProyectoController
{
    public static function index(Router $router)
    {
        $proyectos = Proyecto::all();
        $personas = Equipo::all();
        $testimonios = Testimonial::all();
        $resultado = $_GET['resultado'] ?? null;
        
        $router->render('proyectos/admin', [
            'proyectos' => $proyectos,
            'personas' => $personas,
            'testimonios' => $testimonios,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router)
    {
        $proyecto = new Proyecto;
        $errores = Proyecto::getErrores();
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $proyecto = new Proyecto($_POST['proyecto']);
            $nombreImagen = bin2hex(random_bytes(16)) . ".jpg";
            if ($_FILES['proyecto']["tmp_name"]["portada"]) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES['proyecto']["tmp_name"]["portada"])->scaleDown(width: 1280);
                $proyecto->setImagen($nombreImagen);
            }
            $errores = $proyecto->validar();
            if (empty($errores)) {
                if (!is_dir(RUTA_IMAGENES)) {
                    mkdir(RUTA_IMAGENES, 0755, true);
                }
                $imagen->save(RUTA_IMAGENES . $nombreImagen);
                $resultado = $proyecto->guardar();
                if ($resultado) {
                    header('Location: /admin?resultado=1');
                }
            }
        }
        $router->render('proyectos/crear', [
            'proyecto' => $proyecto,
            'errores' => $errores
        ]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $proyecto = Proyecto::find($id);
        $errores = Proyecto::getErrores();
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $args = $_POST['proyecto'];
            $proyecto->sincronizar($args);
            $proyecto->validar();
            if (empty($errores)) {
                $portadaNombre = bin2hex(random_bytes(16)) . ".jpg";
                if ($_FILES["proyecto"]["tmp_name"]["portada"]) {
                    $manager = new Image(Driver::class);
                    $imagen = $manager->read($_FILES["proyecto"]["tmp_name"]["portada"])->scaleDown(width: 1280);
                    $proyecto->setImagen($portadaNombre);
                    $imagen->save(RUTA_IMAGENES . $portadaNombre);
                }
                $proyecto->guardar();
            }
        }
        $router->render('proyectos/actualizar', [
            'proyecto' => $proyecto,
            'errores' => $errores
        ]);
    }

    public static function eliminar()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);                    
            if ($id) {
                $tipo = $_POST['tipo'];
                if (validarTipoContenido($tipo)) {
                    $proyecto = Proyecto::find($id);
                    $proyecto->eliminar($id);
                }
            }
        }
    }
}
