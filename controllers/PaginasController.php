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
            'inicio' => $inicio
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
            $contenido .= '<body style="font-family: Arial, sans-serif; background-color: #f9f9f9; margin: 0; padding: 0;">';
            $contenido .= '<div style="max-width: 600px; margin: 20px auto; background-color: #ffffff; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); overflow: hidden;">';
            $contenido .= '<div style="background-color: #4CAF50; color: white; padding: 20px; text-align: center;">';
            $contenido .= '<h1 style="margin: 0; font-size: 24px;">Solicitud Recibida</h1>';
            $contenido .= '</div>';
            $contenido .= '<div style="padding: 20px;">';
            $contenido .= '<p style="font-size: 16px; line-height: 1.5; color: #333;">Alguien ha enviado una solicitud con la siguiente información:</p>';
            $contenido .= '<table style="width: 100%; border-collapse: collapse;">';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Nombre:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['nombre']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Email:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['email']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Teléfono:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['telefono']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Tipo PQRFS:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['tipo-servicio']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Proyecto:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['proyecto']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Asunto:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['asunto']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Observaciones:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['observaciones']) . '</td></tr>';
            $contenido .= '<tr><td style="font-weight: bold; padding: 8px; color: #555;">Fecha:</td><td style="padding: 8px; color: #333;">' . htmlspecialchars($_POST['fecha']) . '</td></tr>';
            $contenido .= '</table>';
            $contenido .= '<p style="margin-top: 20px; font-size: 14px; color: #777; text-align: center;">Gracias por usar nuestro servicio.</p>';
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
}
