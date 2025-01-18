<header class="header">
    <div class="contenedor">
        <div class="barra">

            <div class="logos">
                <a href="/" class="logo-soarco">
                    <img src="/build/img/soarco-logo.svg" alt="Logo Soarco SAS" width="300">
                </a>
                <div class="logo-macondo">
                    <img src="/build/img/macondo-logo.svg" alt="Logo Macondo" width="300" height="100">
                </div>
            </div>

            <div class="menu-movil">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="48" height="48" stroke-width="1.5">
                    <path d="M4 6l16 0"></path>
                    <path d="M4 12l16 0"></path>
                    <path d="M4 18l16 0"></path>
                </svg>
            </div>

            <nav class="navegacion-principal">
                <a href="/nosotros">Nosotros</a>
                <a href="#">Servicios</a>
                <a href="/servicio-cliente">Servicio al Cliente</a>
                <a href="/inversionistas">Inversionistas</a>
                <a href="/contacto">Contacto</a>
                <?php if ($auth): ?>
                    <a href="/admin">Administración</a>
                    <a href="/logout">Salir</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header><!-- .header -->