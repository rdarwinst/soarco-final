<fieldset>
    <legend>Información General</legend>
    <div class="campo">
        <label for="titulo">Nombre del Proyecto</label>
        <input type="text" name="proyecto[titulo]" id="titulo" placeholder="Escribe el nombre del proyecto." value="<?php echo s($proyecto->titulo); ?>">
    </div>
    <div class="campo">
        <label for="subtitulo">Subtitulo</label>
        <input type="text" name="proyecto[subtitulo]" id="subtitulo" placeholder="Ej. ¡Últimas 3 Casas!" value="<?php echo s($proyecto->subtitulo); ?>">
    </div>
    <div class="campo">
        <label for="portada">Portada</label>
        <input type="file" name="proyecto[portada]" id="portada" accept="image/jpeg, image/png">
        <?php if ($proyecto->imagen) { ?>
            <img loading="lazy" width="200" height="100" src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="" class="imagen-small">
        <?php } ?>
    </div>
</fieldset>
<fieldset>
    <legend>Información del Proyecto</legend>
    <div class="campo">
        <label for="generalidades">Generalidades</label>
        <textarea name="proyecto[generalidades]" id="generalidades" cols="20" rows="10" placeholder="Ej. Ubicado a tan solo 90 minutos de Bogotá."><?php echo s($proyecto->generalidades); ?></textarea>
    </div>
    <div class="campo">
        <label for="amenidades">Amenidades</label>
        <textarea name="proyecto[amenidades]" id="amenidades" cols="20" rows="10" placeholder="Ej. Circuito cerrado de TV."><?php echo s($proyecto->amenidades); ?></textarea>
    </div>
    <div class="campo">
        <label for="casas">Casas</label>
        <textarea name="proyecto[casas]" id="casas" cols="20" rows="10" placeholder="Ej. Cada casa con piscina privada."><?php echo s($proyecto->casas); ?></textarea>
    </div>
</fieldset>