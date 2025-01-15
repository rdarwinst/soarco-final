<header class="header">
    <div class="contenedor">
        <div class="barra">
            <a href="/" class="logo">
                <img src="/build/img/logo_soarco.png" alt="Logo Soarco" width="200">
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
    </div>
</header><!-- .header -->