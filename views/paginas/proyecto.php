<?php use Model\ImagenesProyecto; ?>
<main class="contenedor proyecto-principal seccion">
    <?php if ($proyecto->titulo === 'Conjunto Residencial Macondo Sunset'): ?>
        <h1 class="titulo"><?php echo s($proyecto->titulo); ?></h1>
        <h2 class="sub-titulo"><?php echo s($proyecto->subtitulo); ?></h2>
        <div class="barra-proyecto">
            <div class="botonera">
                <a href="#etapas">Etapas</a>
                <a href="#">Apartamentos</a>
                <a href="#ubicacion">Ubicación</a>
                <a href="#">Descripción</a>
            </div>
            <p class="precio">Precio apto. con parqueadero desde: <span>$449.420.000</span></p>
        </div>
        <section class="seccion generalidades-grid">
            <div class="generalidades-texto">
                <h3>Generalidades</h3>
                <ul>
                    <?php $lineas = explode("\n", s($proyecto->generalidades)); ?>
                    <?php foreach ($lineas as $linea): ?>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <p><?php echo htmlspecialchars($linea); ?></p>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="contenedor-slider generalidades-slider">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'generalidades');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>

                <div class="slider">
                    <?php foreach ($imagenes as $imagen): ?>
                        <div class="slide">
                            <img loading="lazy" width="300" heigth="100" src="/uploads/images/<?php echo htmlspecialchars($imagen) ?>" alt="Imagen Generalidades">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prevBtn slider-btn"><i class="fa-solid fa-angle-left"></i></button>
                <button class="nextBtn slider-btn"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </section>

        <section class="seccion amenidades-grid">
            <div class="amenidades-texto">
                <h3>Amenidades</h3>
                <?php $lineas = explode("\n", s($proyecto->amenidades)); ?>
                <?php foreach ($lineas as $linea): ?>
                    <ul>
                        <li>
                            <i class="fa-solid fa-circle-check"></i>
                            <p><?php echo htmlspecialchars($linea); ?></p>
                        </li>
                    </ul>
                <?php endforeach; ?>
            </div>

            <div class="contenedor-slider amenidades-slider">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'amenidades');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>

                <div class="slider">
                    <?php foreach ($imagenes as $imagen): ?>
                        <div class="slide">
                            <img loading="lazy" width="300" heigth="100" src="/uploads/images/<?php echo htmlspecialchars($imagen) ?>" alt="Imagen Generalidades">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prevBtn slider-btn"><i class="fa-solid fa-angle-left"></i></button>
                <button class="nextBtn slider-btn"><i class="fa-solid fa-angle-right"></i></button>
            </div>
        </section>

        <section class="seccion etapas" id="etapas">
            <h2>Etapas</h2>
            <div class="etapas-grid">
                <div class="imagen1">
                    <picture>
                        <source srcset="/build/img/Etapas2.avif" type="image/avif">
                        <source srcset="/build/img/Etapas2.webp" type="image/webp">
                        <source srcset="/build/img/Etapas2.jpg" type="image/jpeg">
                        <img loading="lazy" width="200" height="300" src="/build/img/Etapas2.jpg" alt="Imagen Etapas">
                    </picture>
                </div>
                <div class="imagen1">
                    <picture>
                        <source srcset="/build/img/Etapas.avif" type="image/avif">
                        <source srcset="/build/img/Etapas.webp" type="image/webp">
                        <source srcset="/build/img/Etapas.jpg" type="image/jpeg">
                        <img loading="lazy" width="200" height="300" src="/build/img/Etapas.jpg" alt="Imagen Etapas">
                    </picture>
                </div>
            </div>
        </section>

        <section class="seccion tipologias">
            <h2>Tipologías</h2>
            <div class="tipologias-botones">
                <p class="boton-negro" id="tipo1">Tipo 1</p>
                <p class="boton-negro" id="tipo2">Tipo 2</p>
            </div>
            <div class="tipologias-contenedor">
                <div class="imagen-casa">
                    <picture>
                        <source srcset="/build/img/casa.avif" type="image/avif">
                        <source srcset="/build/img/casa.webp" type="image/webp">
                        <source srcset="/build/img/casa.jpg" type="image/jpeg">
                        <img loading="lazy" width="200" height="300" src="/build/img/casa.jpg" alt="">
                    </picture>
                </div>
                <div class="tipologia1" style="display: flex;">
                    <div class="informacion">
                        <div class="titulos">
                            <p>Tipología de Apartamentos</p>
                            <p>Etapa 1</p>
                        </div>
                        <div class="area-construida">
                            <p>Area Total Construida: <span>77m&sup2;</span></p>
                            <span class="verde"></span>
                            <span class="azul"></span>
                            <span class="amarillo"></span>
                        </div>
                    </div>
                    <div class="plano">
                        <picture>
                            <source srcset="/build/img/tipo1.avif" type="image/avif">
                            <source srcset="/build/img/tipo1.webp" type="image/webp">
                            <source srcset="/build/img/tipo1.jpg" type="image/jpeg">
                            <img loading="lazy" width="200" height="300" src="/build/img/tipo1.jpg" alt="Plano tipo 1">
                        </picture>
                    </div>
                </div>
                <div class="tipologia2" style="display: none;">
                    <div class="informacion">
                        <div class="titulos">
                            <p>Tipología de Apartamentos</p>
                            <p>Etapa 1</p>
                        </div>
                        <div class="area-construida">
                            <p>Area Total Construida: <span>87m&sup2;</span></p>
                            <span class="rojo"></span>
                        </div>
                    </div>
                    <div class="plano">
                        <picture>
                            <source srcset="/build/img/tipo2.avif" type="image/avif">
                            <source srcset="/build/img/tipo2.webp" type="image/webp">
                            <source srcset="/build/img/tipo2.jpg" type="image/jpeg">
                            <img loading="lazy" width="200" height="300" src="/build/img/tipo2.jpg" alt="Plano tipo 1">
                        </picture>
                    </div>
                </div>
            </div>
            <div class="contenedor-slider casas-slider">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'casas');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>

                <div class="slider">
                    <?php foreach ($imagenes as $imagen): ?>
                        <div class="slide">
                            <img loading="lazy" width="300" heigth="100" src="/uploads/images/<?php echo htmlspecialchars($imagen) ?>" alt="Imagen Generalidades">
                        </div>
                    <?php endforeach; ?>
                </div>
                <button class="prevBtn slider-btn"><i class="fa-solid fa-angle-left"></i></button>
                <button class="nextBtn slider-btn"><i class="fa-solid fa-angle-right"></i></button>
            </div>

        </section>

        <section class="ubicacion" id="ubicacion">
            <h2>Ubicación y Vista Exclusiva</h2>
            <p>Un proyecto Ideal para los que disfrutan del paseo urbano diario sin depender del vehículo, y a su vez ser dueños exclusivos de la mejor vista panorámica de la región.</p>
            <div id="map" class="mapa"></div>
        </section>

    <?php else: ?>
        <h1 class="titulo"><?php echo s($proyecto->titulo) ?></h1>
        <h2 class="sub-titulo"><?php echo s($proyecto->subtitulo); ?></h2>

        <div class="galeria" id="imagenes-generales">
            <div class="imagenes-generales">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'generalidades');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>

                <?php foreach ($imagenes as $image): ?>
                    <img class="imagen-galeria" data-info="Generalidades" loading="lazy" width="300" height="100" src="/uploads/images/<?php echo htmlspecialchars($image); ?>" alt="Imagen Generalidades">
                <?php endforeach; ?>
            </div>
        </div>

        <div class="generalidedades seccion">
            <h3>Generalidades</h3>
            <ul>
                <?php $lineas = explode("\n", s($proyecto->generalidades)); ?>
                <?php foreach ($lineas as $linea): ?>
                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        <p><?php echo htmlspecialchars($linea); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="amenidades seccion">
            <h3>Amenidades</h3>
            <div class="imagenes-amenidades">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'amenidades');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>

                <?php foreach ($imagenes as $imagen): ?>
                    <img class="imagen-galeria" data-info="Amenidades" src="/uploads/images/<?php echo htmlspecialchars($imagen); ?>" alt="Imagen Amenidades">
                <?php endforeach; ?>
            </div>

            <ul class="lista-amenidades">
                <?php $lineas = explode("\n", s($proyecto->amenidades)); ?>
                <?php foreach ($lineas as $linea): ?>
                    <li>
                        <i class="fa-solid fa-circle-check"></i>
                        <p><?php echo htmlspecialchars($linea); ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <div class="casas seccion">
            <div class="casas-grid">
                <video autoplay muted loop>
                    <source src="video/refugio.mp4" type="video/mp4">
                    <source src="video/refugio.ogv" type="video/ogg">
                    <source src="video/refugio.webm" type="video/webm">
                </video>
                <div class="casas-informacion">
                    <h3>Casas</h3>
                    <ul>
                        <?php $lineas = explode("\n", s($proyecto->casas)); ?>
                        <?php foreach ($lineas as $linea): ?>
                            <li>
                                <i class="fa-regular fa-circle-check"></i>
                                <p><?php echo htmlspecialchars($linea); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <div class="casas-imagenes">
                <?php
                    $imagenes = [];
                    $generalidades = ImagenesProyecto::findByProyectoYTipo($id, 'casas');
                    foreach($generalidades as $image) {
                        $imagenes[] = $image->imagen;
                    }
                ?>
                <?php foreach ($imagenes as $imagen): ?>
                    <img class="imagen-galeria" data-info="Casas" loading="lazy" width="300" height="100" src="/uploads/images/<?php echo htmlspecialchars($imagen); ?>" alt="Imagen Casas">
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</main>