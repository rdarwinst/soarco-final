<?php

namespace Controllers;

use Model\Equipo;
use Model\Proyecto;
use Model\Testimonial;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController
{

    public static function index(Router $router)
    {
        $proyectos = Proyecto::get(2);
        $tesimonios = Testimonial::get(3);
        $inicio = true;

        $router->render('paginas/index', [
            'proyectos' => $proyectos,
            'testimonios' => $tesimonios,
            'inicio' => $inicio,
            'scripts' => ['https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js']
        ]);
    }
    public static function nosotros(Router $router)
    {
        $equipo = Equipo::all();
        $router->render('paginas/nosotros', [
            'equipo' => $equipo
        ]);
    }
    public static function proyectos(Router $router)
    {
        $proyectos = Proyecto::all();
        $router->render('paginas/proyectos', [
            'proyectos' => $proyectos
        ]);
    }
    public static function proyecto(Router $router)
    {
        $id = validarORedireccionar('/proyectos');
        $proyecto = Proyecto::find($id);
        $router->render('paginas/proyecto', [
            'proyecto' => $proyecto,
            'id' => $id,
        ]);
    }
    /*     public static function servicios(Router $router)
    {
        debuguear('Desde Servicios');
    } */
    public static function avaluos(Router $router)
    {
        $router->render('paginas/avaluos');
    }
    public static function compraventa(Router $router)
    {
        $router->render('paginas/compraventa');
    }
    public static function deposito(Router $router)
    {
        $router->render('paginas/deposito');
    }
    public static function gestion(Router $router)
    {
        $router->render('paginas/gestion-inmobiliaria');
    }
    public static function servicioCliente(Router $router)
    {
        $mensaje = null;

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            // Crear instancia de PHP Mailer
            $mail = new PHPMailer();
            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar contenido del email
            $mail->setFrom('pqrfs@constructorasoarco.com'); // Quien envia el correo
            $mail->addAddress('pqrfs@constructorasoarco.com', 'constructorasoarco.com'); // A donde se va a enviar el correo
            $mail->Subject = htmlspecialchars($_POST["tipo-servicio"]) . ' de Constructora Soarco SAS';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Conenido del mail
            $contenido = '<html>';
            $contenido .= '<head>';
            $contenido .= '<meta name="viewport" content="width=device-width, initial-scale=1.0">';
            $contenido .= '<style>';
            $contenido .= 'body { font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0; }';
            $contenido .= '.email-container { max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden; }';
            $contenido .= '.header { background-color: #4CAF50; color: white; padding: 20px; text-align: center; }';
            $contenido .= '.header h1 { margin: 0; font-size: 24px; }';
            $contenido .= '.content { padding: 20px; }';
            $contenido .= '.content p { font-size: 16px; line-height: 1.5; color: #333; }';
            $contenido .= 'table { width: 100%; border-collapse: collapse; }';
            $contenido .= 'td { padding: 8px; color: #333; }';
            $contenido .= 'td.bold { font-weight: bold; color: #555; }';
            $contenido .= '.footer { margin-top: 20px; font-size: 14px; color: #777; text-align: center; }';
            $contenido .= '@media screen and (max-width: 600px) {';
            $contenido .= '.header h1 { font-size: 20px; }';
            $contenido .= '.content p { font-size: 14px; }';
            $contenido .= 'td { padding: 6px; }';
            $contenido .= 'td.bold { font-size: 14px; }';
            $contenido .= '}';
            $contenido .= '</style>';
            $contenido .= '</head>';
            $contenido .= '<body>';
            $contenido .= '<div class="email-container">';
            $contenido .= '<div class="header">';
            $contenido .= '<h1>Solicitud Recibida</h1>';
            $contenido .= '</div>';
            $contenido .= '<div class="content">';
            $contenido .= '<p>Alguien ha enviado una solicitud con la siguiente información:</p>';
            $contenido .= '<table>';
            $contenido .= '<tr><td class="bold">Nombre:</td><td>' . htmlspecialchars($_POST['nombre']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Email:</td><td>' . htmlspecialchars($_POST['email']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Teléfono:</td><td>' . htmlspecialchars($_POST['telefono']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Tipo PQRFS:</td><td>' . htmlspecialchars($_POST['tipo-servicio']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Proyecto:</td><td>' . htmlspecialchars($_POST['proyecto']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Asunto:</td><td>' . htmlspecialchars($_POST['asunto']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Observaciones:</td><td>' . htmlspecialchars($_POST['observaciones']) . '</td></tr>';
            $contenido .= '<tr><td class="bold">Fecha:</td><td>' . htmlspecialchars($_POST['fecha']) . '</td></tr>';
            $contenido .= '</table>';
            $contenido .= '<p class="footer">Gracias por usar nuestro servicio.</p>';
            $contenido .= '</div>';
            $contenido .= '</div>';
            $contenido .= '</body>';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el mail
            if ($mail->send()) {
                $mensaje =  "Mensaje Enviado Correctamente.";
            } else {
                $mensaje =  "El mensaje no pudo ser enviado.";
            }
        }

        $router->render('paginas/serviciocliente', [
            'mensaje' => $mensaje
        ]);
    }
    public static function inversionistas(Router $router)
    {
        $router->render('paginas/inversionistas');
    }
    public static function testimonios(Router $router)
    {
        $testimonios = Testimonial::all();

        $router->render('paginas/testimonios', [
            'testimonios' => $testimonios
        ]);
    }
    public static function contacto(Router $router)
    {

        $mensaje = null;

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            $informacion = $_POST['contacto'];

            // Crear instancia de PHP Mailer
            $mail = new PHPMailer();
            // Configurar SMTP
            $mail->isSMTP();
            $mail->Host = $_ENV['EMAIL_HOST'];
            $mail->SMTPAuth = true;
            $mail->Username = $_ENV['EMAIL_USER'];
            $mail->Password = $_ENV['EMAIL_PASS'];
            $mail->Port = $_ENV['EMAIL_PORT'];

            // Configurar contenido del email
            $mail->setFrom('admin@constructorasoarco.com'); // Quien envia el correo
            $mail->addAddress('admin@constructorasoarco.com', 'constructorasoarco.com'); // A donde se va a enviar el correo
            $mail->Subject = 'Nuevo Mensaje de Constructora Soarco SAS';

            // Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //Conenido del mail
            $contenido = '<html>';
            $contenido .= '<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">';
            $contenido .= '<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">';
            $contenido .= '<div style="background-color: #004080; color: white; padding: 20px; text-align: center;">';
            $contenido .= '<h1 style="margin: 0; font-size: 24px;">Nuevo Mensaje</h1>';
            $contenido .= '<p style="margin: 0; font-size: 16px;">Constructora Soarco SAS</p>';
            $contenido .= '</div>';
            $contenido .= '<div style="padding: 20px;">';
            $contenido .= '<p style="font-size: 16px; line-height: 1.5; color: #333;">Has recibido un nuevo mensaje con los siguientes detalles:</p>';
            $contenido .= '<table style="width: 100%; border-collapse: collapse;">';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Nombre:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['nombre']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Teléfono:</td><td style="padding: 8px; color: #333;">' . (isset($informacion['telefono']) ? htmlspecialchars($informacion['telefono']) : 'No Aplica') . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Email:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['email']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Asunto:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['asunto']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Mensaje:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['mensaje']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Ubicación:</td><td style="padding: 8px; color: #333;">' . (isset($informacion['ubicacion']) ? htmlspecialchars($informacion['ubicacion']) : 'No Aplica') . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Tipo Persona:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['tipo']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Servicio de Interés:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($informacion['servicios']) . '</td></tr>';
            $contenido .= '</table>';
            $contenido .= '<p style="margin-top: 20px; font-size: 14px; color: #777; text-align: center;">Gracias por contactar a Constructora Soarco SAS.</p>';
            $contenido .= '</div>';
            $contenido .= '</div>';
            $contenido .= '</body>';
            $contenido .= '</html>';



            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternativo sin HTML';

            //Enviar el mail
            if ($mail->send()) {
                $mensaje =  "Mensaje Enviado Correctamente.";
            } else {
                $mensaje =  "El mensaje no pudo ser enviado.";
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

    public static function ayuda()
    {
        $errores = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            if (!$_POST['nombre']) {
                $errores[] = "Debe ingresar su nombre.";
            }
            if (!$_POST['apellido']) {
                $errores[] = "Debe ingresar su apellido.";
            }
            if (!$_POST['email']) {
                $errores[] = "El email es importante para ponernos en contacto";
            }
            if (!$_POST['telefono']) {
                $errores[] = "El número de teléfono es obligatorio para ponernos en contacto!";
            }

            if (empty($errores)) {
                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'sandbox.smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Port = 2525;
                $mail->Username = '23e4a27c8f08f6';
                $mail->Password = 'aaaba31fa04c22';

                $mail->setFrom('contacto@constructorasoarco.com', 'Ayuda Constructora Soarco');
                $mail->addAddress('contacto@constructorasoarco.com', 'wwww.constructorasoarco.com');
                $mail->Subject = 'Alguien ha solicitado información.';
                $mail->isHTML(true);
                $mail->CharSet = 'UTF-8';

                $contenido = '<html>';
                $contenido .= '<head>';
                $contenido .= '<style>';
                $contenido .= 'body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background-color: #f4f4f9; }';
                $contenido .= '.email-container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); }';
                $contenido .= 'h1 { color: #007BFF; text-align: center; }';
                $contenido .= 'h3 { color: #555; }';
                $contenido .= 'ul { list-style-type: none; padding: 0; }';
                $contenido .= 'li { margin: 10px 0; padding: 10px; background: #f9f9f9; border-radius: 4px; }';
                $contenido .= 'li strong { color: #007BFF; }';
                $contenido .= 'p { text-align: center; font-size: 14px; color: #666; }';
                $contenido .= '.footer { text-align: center; margin-top: 20px; font-size: 12px; color: #999; }';
                $contenido .= '</style>';
                $contenido .= '</head>';
                $contenido .= '<body>';
                $contenido .= '<div class="email-container">';
                $contenido .= '<h1>¡Hola!</h1>';
                $contenido .= '<h3>Alguien ha solicitado más información desde tu sitio web.</h3>';
                $contenido .= '<p>Estos son los datos proporcionados:</p>';
                $contenido .= '<ul>';
                $contenido .= '<li><strong>Nombre:</strong> ' . htmlspecialchars($_POST["nombre"]) . ' ' . htmlspecialchars($_POST["apellido"]) . '</li>';
                $contenido .= '<li><strong>Correo Electrónico:</strong> ' . htmlspecialchars($_POST["email"]) . '</li>';
                $contenido .= '<li><strong>Teléfono:</strong> ' . htmlspecialchars($_POST["telefono"]) . '</li>';
                $contenido .= '</ul>';
                $contenido .= '<p>Este formulario fue completado el: <strong>' . date('Y/m/d') . '</strong></p>';
                $contenido .= '<div class="footer">';
                $contenido .= '<p>Por favor, no respondas directamente a este correo.</p>';
                $contenido .= '</div>';
                $contenido .= '</div>';
                $contenido .= '</body>';
                $contenido .= '</html>';


                $mail->Body = $contenido;
                $mail->AltBody = 'La persona: ' . $_POST['nombre'] . ' ' . $_POST['apellido'] . 'ha solicitado más información desde el sitio web el dia ' . date('Y/m/d') .  ' este es su email: ' . $_POST['email'] . ' y este es su telefono: ' . $_POST['telefono'];

                if ($mail->send()) { ?>
                    <script>
                        alert(`Mensaje enviado correctamente :)`);
                        window.location.href = "<?php echo  $_SERVER['HTTP_REFERER'] ?>";
                    </script>
                <?php } else { ?>
                    <script>
                        alert(`Error al enviar el mensaje :(`);
                        window.location.href = "<?php echo  $_SERVER['HTTP_REFERER'] ?>";
                    </script>
<?php }
            }
        }
    }
}
