<?php

namespace Controllers;

use MVC\Router;
use Model\Proyecto;
use Model\Testimonial;
use Intervention\Image\ImageManager as Image;
use Intervention\Image\Drivers\Gd\Driver;

class TestimonioController
{
    public static function crear(Router $router)
    {
        $errores = Testimonial::getErrores();
        $testimonial = new Testimonial;
        $proyectos = Proyecto::all();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $testimonial = new Testimonial($_POST['testimonial']);

            $nombreFoto = bin2hex(random_bytes(16)) . ".jpg";

            if ($_FILES["testimonial"]["tmp_name"]["foto"]) {
                $manager = new Image(Driver::class);
                $imagen = $manager->read($_FILES["testimonial"]["tmp_name"]["foto"])->scaleDown(width: 1280);
                $testimonial->setImagen($nombreFoto);
            }

            $errores = $testimonial->validar();

            if (empty($errores)) {

                if (!is_dir(RUTA_IMAGENES)) {
                    mkdir(RUTA_IMAGENES, 0755, true);
                }

                $imagen->save(RUTA_IMAGENES . $nombreFoto);

                $resultado = $testimonial->guardar();

                if ($resultado) {
                    header('Location: /testimonios?resultado=1');
                    exit;
                }
            }
        }

        $router->render('paginas/formTestimoniales', [
            'testimonial' => $testimonial,
            'proyectos' => $proyectos,
            'errores' => $errores
        ]);
    }
    public static function eliminar()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $id = intval($_POST['id']);
            $id = filter_var($id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo'];

            if ($id) {
                if (validarTipoContenido($tipo)) {
                    $testimonio = Testimonial::find($id);
                    $testimonio->eliminar($id);
                }
            }
        }
    }
}
