<?php

declare(strict_types=1);

use App\Testimonial;

if ($_SERVER["REQUEST_URI"] === '/testimonios.php') {
    $testimonios = Testimonial::all();
} else {
    $testimonios = Testimonial::get(3);
}

?>

<div class="contenedor-testimonios">
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