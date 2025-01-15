<main class="contenedor seccion">
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <?php if ($proyectos): ?>
        <h1>Cargar Imágenes a Un Proyecto</h1>
        <a href="/admin" class="boton-negro"><i class="fa-solid fa-arrow-left"></i></a>
        <form method="post" class="formulario formulario-imagenes contenido-centrado" enctype="multipart/form-data">
            <fieldset>
                <legend>Subir Imágenes</legend>
                <div class="campo">
                    <label for="tipo">Categoría</label>
                    <select name="tipo" id="tipo">
                        <option value="generalidades">Generalidades</option>
                        <option value="amenidades">Amenidades</option>
                        <option value="casas">Casas</option>
                    </select>
                </div>
                <div class="campo">
                    <label for="imagen">Selección de Imágenes</label>
                    <input type="file" name="imagen[]" id="imagen" accept="image/jpeg, image/png" multiple>
                </div>
            </fieldset>
            <fieldset>
                <legend>Seleccionar un Proyecto</legend>
                <div class="campo">
                    <label for="proyecto_id">Proyecto</label>
                    <select name="proyecto_id" id="proyecto_id">
                        <?php foreach ($proyectos as $proyecto): ?>
                            <option value="<?php echo s($proyecto->id); ?>">
                                <?php echo s($proyecto->titulo); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </fieldset>
            <input type="submit" value="Cargar Imágenes" class="boton-negro w-sm-100">
        </form>
    <?php else : ?>
        <img loading="lazi" width="300" height="100" src="/build/img/400.svg" alt="Error 400">
        <h2>No hay ningun proyecto aún.</h2>
    <?php endif; ?>
</main>