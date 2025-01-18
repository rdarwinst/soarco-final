<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$auth = $_SESSION['login'] ?? false;
$inicio = $inicio ?? false;
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
    <title>Constructora Soarco SAS</title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="preload" href="../build/css/app.css" as="style" onload="this.onload.null;this.rel='stylesheet'">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <noscript>
        <link rel="stylesheet" href="../build/css/app.css">
    </noscript>
</head>

<body>

    <?php $header = $inicio ? 'header-home.php' : 'header.php'; ?>

    <?php include $header; ?>

    <?php echo $contenido; ?>


    <!-- Icono de WhatsApp -->
    <a href="https://wa.link/g62x24" class="whatsapp-button" target="_blank" aria-label="Contactar por WhatsApp"
        title="Contactar por WhatsApp"><i class="fa-brands fa-whatsapp"></i></a>

    <footer class="footer seccion">
        <div class="contenedor navegacion-footer">
            <div class="footer-menu" id="servicios">
                <h3>Servicios</h3>
                <nav class="categorias">
                    <a href="/compraventa">Compra / Venta de Inmuebles</a>
                    <a href="/avaluos">Avalúos</a>
                    <a href="/deposito">Depósito de Propiedades</a>
                    <a href="/gestion">Gestión Inmobiliaria</a>
                </nav>
            </div>
            <div class="footer-menu">
                <h3>Sobre Nosotros</h3>
                <nav class="sobre-nosotros-nav">
                    <a href="/nosotros#historia">Nuestra Historia</a>
                    <a href="/nosotros#mision">Misión, Visión y Valores</a>
                </nav>
            </div>
            <div class="footer-menu">
                <h3>Soporte</h3>
                <nav class="soporte">
                    <a href="/testimonios/crear">Opinar sobre un proyecto</a>
                    <a href="/servicio-cliente">PQRSF</a>
                </nav>
            </div>
            <div class="logo-fiduoccidente">
                <a href="https://fiduoccidente.com/" target="_blank" aria-label="Sitio Web FiduOccidente">
                    <img src="/build/img/fiduoccidente.png" alt="Imagen Logo FiduOccidente">
                </a>
            </div>
        </div>
        <div class="contenido-footer">
            <p class="copyright">
                Todos los derechos reservados. 2024 &copy;
            </p>
            <nav class="redes-sociales">
                <a href="https://www.facebook.com/"><span>Facebook</span></a>
                <a href="https://www.instagram.com/"><span>Instagram</span></a>
                <a href="https://www.x.com/"><span>X</span></a>
                <a href="https://www.tiktok.com/"><span>Tiktok</span></a>
                <a href="https://www.youtube.com/"><span>YouTube</span></a>
            </nav>
        </div>
    </footer>
    <?php include 'ayuda.php' ?>

    <script src="../build/js/bundle.min.js"></script>
    <?php if (isset($scripts) && is_array($scripts)): ?>
        <?php foreach ($scripts as $script): ?>
            <script src="<?php echo $script; ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>