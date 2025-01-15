<div class="contenedor-testimonios contenedor">
    <?php foreach ($testimonios as $testimonio): ?>
        <div class="testimonio">
            <blockquote>
                <?php echo s($testimonio->testimonio); ?>
            </blockquote>
            <div class="imagen-testimonio">
                <img loading="lazy" width="300" height="100" src="/uploads/images/<?php echo s($testimonio->imagen); ?>" alt="Imagen del Usuario">
            </div>
            <p class="autor centrar-texto"><?php echo s($testimonio->nombre) . " " . s($testimonio->apellido); ?></p>

            <p class="fecha no-margin">Escrito el: <span><?php echo s($testimonio->fecha); ?></span></p>
        </div><!-- .testimonio -->
    <?php endforeach; ?>
</div>