<?php

namespace Controllers;

use MVC\Router;
use Model\Equipo;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class EquipoController
{
    public static function crear(Router $router)
    {
        $equipo = new Equipo;
        $errores = Equipo::getErrores();
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $equipo = new Equipo($_POST['equipo']);
            $nombreFoto = bin2hex(random_bytes(16)) . ".jpg";
            if ($_FILES["equipo"]["tmp_name"]["foto"]) {
                $manager = new Image(Driver::class);
                $image = $manager->read($_FILES["equipo"]["tmp_name"]["foto"])->coverDown(800, 600, 'center');
                $equipo->setImagen($nombreFoto);
            }
            $errores = $equipo->validar();
            if (empty($errores)) {
                if (!is_dir(RUTA_IMAGENES)) {
                    mkdir(RUTA_IMAGENES, 0755, true);
                }
                $image->save(RUTA_IMAGENES . $nombreFoto);
                $equipo->guardar();
            }
        }

        $router->render('equipo/crear', [
            'equipo' => $equipo,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarORedireccionar('/admin');
        $equipo = Equipo::find($id);
        $errores = $errores = Equipo::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $args = $_POST['equipo'];
            $equipo->sincronizar($args);
            $errores = $equipo->validar();
            if (empty($errores)) {
                $nombreFoto = bin2hex(random_bytes(16)) . ".jpg";
                if ($_FILES["equipo"]["tmp_name"]["foto"]) {
                    $manager = new Image(Driver::class);
                    $imagen = $manager->read($_FILES["equipo"]["tmp_name"]["foto"])->coverDown(800, 600, 'center');
                    $equipo->setImagen($nombreFoto);
                    $imagen->save(RUTA_IMAGENES . $nombreFoto);
                }
                $equipo->guardar();
            }
        }
        $router->render('equipo/actualizar', [
            'equipo' => $equipo,
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
                    $equipo = Equipo::find($id);
                    $equipo->eliminar($id);
                }
            }
        }
    }
}
