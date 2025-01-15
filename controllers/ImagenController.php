<?php

namespace Controllers;

use Model\ImagenesProyecto;
use Model\Proyecto;
use MVC\Router;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class ImagenController
{
    public static function subir(Router $router)
    {
        $proyectos = Proyecto::all();
        $errores = [];

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $images = $_FILES['imagen']['tmp_name'];        

            if (is_array($images)) {
                foreach ($images as $tmpName) {
                    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

                    $manager = new Image(Driver::class);
                    $imagen = $manager->read($tmpName)->scaleDown(width: 1280);

                    $rutaImagen = RUTA_IMAGENES . $nombreImagen;
                    if (!$imagen->save($rutaImagen)) {
                        $errores[] = "Error al guardar la imagen en el servidor.";
                        continue;
                    }

                    $nuevaImagen = new ImagenesProyecto([
                        'imagen' => $nombreImagen,
                        'tipo' => $_POST['tipo'],
                        'proyecto_id' => $_POST['proyecto_id']
                    ]);

                    $resultado = $nuevaImagen->crear();
                    if (!$resultado) {
                        $errores[] = "Error al guardar la imagen '{$nombreImagen}' en la base de datos.";
                    }
                }
            } else {
                $errores[] = "No se enviaron imágenes para procesar.";
            }

            if (empty($errores)) {
                header('Location: /admin?resultado=1');
                exit;
            }
        }

        $router->render('proyectos/imagenes', [
            'proyectos' => $proyectos,
            'errores' => $errores
        ]);
    }
}
