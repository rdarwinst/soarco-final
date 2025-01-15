<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
?>
<!DOCTYPE html>
<html lang="es-CO">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Conoce los proyectos inmobiliarios de Constructora Soarco.">
    <meta name="keywords"
        content="Soarco, Constructora, Casa, Vivienda, Inmobiliaria, Proyecto, Propiedades, Compra, Venta, Inmuebles">
    <meta name="author" content="Constructora Soarco SAS">
    <meta http-equiv="Cache-Control" content="no-store">
    <title>Base - Constructora Soarco SAS</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="preload" href="/build/css/app.css" as="style" onload="this.onload.null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="/build/css/app.css">
    </noscript>
</head>

<body>

    <header class="header">
        <div class="contenedor">
            <div class="barra">
                <a href="/" class="logo">
                    <picture>
                        <source srcset="/build/img/logo_soarco.avif" type="image/avif">
                        <source srcset="/build/img/logo_soarco.webp" type="image/webp">
                        <source srcset="/build/img/logo_soarco.jpg" type="image/jpeg">
                        <img loading="lazy" width="200" height="300" src="/build/img/logo_soarco.jpg"" alt=" Logo
                            Constructura Soarco">
                    </picture>
                    <p>Constructora <span>Soarco SAS</span></p>
                </a>

                <div class="navegacion-principal">
                    <a href="nosotros.php">Nosotros</a>
                    <div class="dropdown">
                        <a href="#">Servicios</a>
                        <div class="dropdown-content">
                            <a href="avaluos.php">Avalúos</a>
                            <a href="compraventa.php">Compra | Venta de Inmuebles</a>
                            <a href="deposito.php">Depósito de Propiedades</a>
                            <a href="gestion.php">Gestión Inmobiliaria</a>
                        </div>
                    </div>
                    <a href="serviciocliente.php">Servicio al Cliente</a>
                    <a href="inversionistas.php">Inversionistas</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if ($auth): ?>
                        <a href="/admin">Admin</a>
                        <a href="cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </div>

                <div class="navegacion-movil">
                    <div class="menu-toggle">
                        <span class="menu-toggle__barra1"></span>
                        <span class="menu-toggle__barra2"></span>
                        <span class="menu-toggle__barra3"></span>
                    </div>
                    <nav class="menu-movil">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="#">Servicios</a>
                        <a href="serviciocliente.php">Servicio al Cliente</a>
                        <a href="inversionistas.php">Inversionistas</a>
                        <a href="contacto.php">Contacto</a>
                        <?php if ($auth): ?>
                            <a href="/admin">Admin</a>
                            <a href="cerrar-sesion.php">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
        </div>
    </header><!-- .header -->