<div class="proximos-lanzamientos">
    <p class="centrar-texto">
        Próximo lanzamiento: <span>Apartamentos y locales en la mejor ubicación de La Mesa, Cundinamarca.</span>
    </p>
</div>

<?php

use Model\Proyecto;

$proyecto = Proyecto::where('titulo', 'Conjunto Residencial Macondo Sunset');
?>
<main class="macondo" style="background-image: linear-gradient(rgb(13 13 13 / .4) 0, rgb(13 13 13 / .6) 100%), url('/uploads/images/<?php echo s($proyecto->imagen); ?>');" id="ultimo-proyecto">
    <div class="contenedor">
        <a href="/proyecto?id=<?php echo s($proyecto->titulo); ?>">
            <h1 class="ml2"><?php echo s($proyecto->titulo); ?></h1>
        </a>
    </div>
</main>

<div class="contenedor alinear-derecha">
    <a href="/proyectos" class="boton-negro-block w-sm-100">Ver Más Proyectos</a>
</div>


<section class="testimoniales contenedor seccion">
    <h2 class="centrar-texto">Testimonios que hablan por si solos</h2>
    <?php include 'testimoniales.php'; ?>
    <a href="/testimonios" class="boton-negro w-sm-100">Ver Todos</a>
</section>

<section class="sobre-nosotros seccion">
    <div class="contenedor sobre-nosotros-contenido">
        <div class="sobre-nosotros-texto">
            <h2>Sobre Nosotros</h2>
            <p>En <span>Constructora Soarco SAS</span>, nos especializamos en transformar sus sueños inmobiliarios
                en realidad. Con un equipo de expertos comprometidos, ofrecemos un servicio personalizado y
                soluciones efectivas para cada necesidad. Su próxima propiedad está a solo un paso de distancia.
                ¡Descúbrala con nosotros!</p>
        </div>
        <div class="sobre-nosotros-btn">
            <a href="/nosotros" class="boton-negro-block">Saber Mas</a>
        </div>
    </div>
</section>