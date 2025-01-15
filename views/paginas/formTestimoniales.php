<main class="contenedor seccion opinion">
    <form action="" method="post" class="form-testimoniales contenido-centrado" enctype="multipart/form-data">
        <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>
        <fieldset>
            <legend>
                ¿Tuvimos éxito en ayudarte a encontrar tu nuevo hogar? ¡Déjanos saber!
            </legend>
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="testimonial[nombre]" id="nombre" placeholder="Escribe tu nombre." value="<?php echo s($testimonial->nombre); ?>">
            </div>
            <div class="campo">
                <label for="apellido">Apellido</label>
                <input type="text" name="testimonial[apellido]" id="apellido" placeholder="Escribe tu apellido." value="<?php echo s($testimonial->apellido); ?>">
            </div>
            <div class="campo">
                <label for="proyecto">Proyecto al que le dejarás la opinión</label>
                <select name="testimonial[proyecto_id]" id="proyecto">
                    <?php foreach ($proyectos as $proyecto): ?>
                        <option <?php echo $testimonial->proyecto_id === $proyecto->id ? 'selected' : ''; ?> value="<?php echo s($proyecto->id); ?>"><?php echo s($proyecto->titulo); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="campo">
                <label for="foto">Fotografía</label>
                <input type="file" name="testimonial[foto]" id="foto" accept="image/jpeg, image/png">
            </div>
            <div class="campo">
                <label for="testimonio">Tu Opinión</label>
                <textarea name="testimonial[testimonio]" id="testimonio" cols="20" rows="10" placeholder="Escribe que tal fue la experiencia con nosotros."><?php echo s($testimonial->testimonio); ?></textarea>
            </div>
            <input type="submit" class="boton-negro-block w-sm-100" value="Enviar Opinión">
        </fieldset>
    </form>
    <div class="opinion-imagen">
        <picture>
            <source srcset="/build/img/opinion.avif" type="image/avif">
            <source srcset="/build/img/opinion.webp" type="image/webp">
            <source srcset="/build/img/opinion.jpg" type="image/jpeg">
            <img loading="lazy" width="200" height="300" src="/build/img/opinion.jpg" alt="Imagen Opinion">
        </picture>
    </div>
</main>