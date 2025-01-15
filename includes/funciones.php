<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('RUTA_IMAGENES', $_SERVER["DOCUMENT_ROOT"] . '/uploads/images/');

function incluirTemplate(string $nombre, bool $inicio = false)
{
    include TEMPLATES_URL . "/{$nombre}.php";
}

function verificarAuth()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function debuguear($variable)
{
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

function s($html): string
{
    $s = htmlspecialchars($html);
    return $s;
}

function validarTipoContenido($tipo)
{
    $tipos = ['proyecto', 'equipo', 'testimonio'];
    return in_array($tipo, $tipos);
}
function mostrarAlertas($codigo)
{
    $mensaje = '';
    switch ($codigo) {
        case 1:
            $mensaje = '¡Creado Correctamente!';
            break;
        case 2:
            $mensaje = 'Actualizado Correctamente!';
            break;
        case 3:
            $mensaje = 'Eliminado Correctamente!';
            break;
        default:
            $mensaje = false;
            break;
    }

    return $mensaje;
}


function validarORedireccionar(string $url)
{
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header("Location: {$url}");
        exit;
    }

    return $id;
}
