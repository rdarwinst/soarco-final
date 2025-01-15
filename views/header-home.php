<header class="header-home">
    <video autoplay muted loop>
        <source src="video/home.mp4" type="video/mp4">
        <source src="video/home.ogv" type="video/ogg">
        <source src="video/home.webm" type="video/webm">
    </video>

    <div class="overlay">
        <div class="contenedor contenido-video">
            <div class="barra">
                <a href="/" class="logo">
                    <img src="/build/img/logo_soarco.png" alt="Logo Soarco">
                </a>

                <div class="navegacion-principal">
                    <a href="/nosotros">Nosotros</a>
                    <div class="dropdown" role="menu">
                        <a href="#" aria-haspopup="true" aria-expanded="false">Servicios</a>
                        <div class="dropdown-content">
                            <a href="/avaluos">Avalúos</a>
                            <a href="/compraventa">Compra | Venta de Inmuebles</a>
                            <a href="/deposito">Depósito de Propiedades</a>
                            <a href="/gestion">Gestión Inmobiliaria</a>
                        </div>
                    </div>
                    <a href="/servicio-cliente">Servicio al Cliente</a>
                    <a href="/inversionistas">Inversionistas</a>
                    <a href="/contacto">Contacto</a>
                    <?php if ($auth): ?>
                        <a href="/admin">Admin</a>
                        <a href="/logout">Cerrar Sesión</a>
                    <?php endif; ?>
                </div>

                <div class="navegacion-movil">
                    <div class="menu-toggle">
                        <span class="menu-toggle__barra1"></span>
                        <span class="menu-toggle__barra2"></span>
                        <span class="menu-toggle__barra3"></span>
                    </div>
                    <nav class="menu-movil">
                        <a href="/nosotros">Nosotros</a>
                        <a href="#">Servicios</a>
                        <a href="/servicio-cliente">Servicio al Cliente</a>
                        <a href="/inversionistas">Inversionistas</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth): ?>
                            <a href="/admin">Admin</a>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>
            <div class="contenido-header">
                <h2>Somos una gran fabrica de Imaginación <span>Hacemos Arquitectura que deleita tus sentidos y
                        optimiza tu bienestar.</span></h2>
                <div class="mas-informacion">
                    <a href="#proyectos" class="boton-negro">Proyectos En Ejecución <i
                            class="fa-solid fa-arrow-down"></i></a>
                    <div class="frase">
                        <blockquote>"La lógica te lleva del punto A al punto B, la imaginación te lleva a todas
                            partes."</blockquote>
                        <p>Albert Einstein. 1929</p>
                    </div>
                </div>
            </div>
        </div>
</header>