<main class="contenedor seccion proyectos" id="proyectos">
    <h1 class="centrar-texto">Proyectos en Ejecución</h1>
    <div class="contenedor-proyectos">
        <?php foreach ($proyectos as $proyecto): ?>
            <a href="/proyecto?id=<?php echo s($proyecto->id); ?>" class="proyecto">
                <img loading="lazy" width="300" height="100" src="/uploads/images/<?php echo s($proyecto->imagen) ?>" alt="Imagen de Portada">
                <div class="overlay">
                    <div class="proyecto-informacion">
                        <h3 class="no-margin titulo centrar-texto"><?php echo s($proyecto->titulo); ?></h3>
                        <?php if ($proyecto->subtitulo) ?>
                        <p class="no-margin sub-titulo centrar-texto"><?php echo s($proyecto->subtitulo); ?></p>
                        <?php ?>
                    </div>
                </div>
            </a><!-- .proyecto -->
        <?php endforeach; ?>
</main>