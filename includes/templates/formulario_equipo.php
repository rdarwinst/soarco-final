<div class="campo">
    <label for="nombre">Nombre</label>
    <input type="text" name="equipo[nombre]" id="nombre" value="<?php echo s($equipo->nombre); ?>">
</div>
<div class="campo">
    <label for="apellido">Apellido</label>
    <input type="text" name="equipo[apellido]" id="apellido" value="<?php echo s($equipo->apellido); ?>">
</div>
<div class="campo">
    <label for="cargo">Cargo</label>
    <input type="text" name="equipo[cargo]" id="cargo" value="<?php echo s($equipo->cargo); ?>">
</div>
<div class="campo">
    <label for="correo">Correo</label>
    <input type="email" name="equipo[correo]" id="correo" value="<?php echo s($equipo->correo); ?>">
</div>
<div class="campo">
    <label for="telefono">Teléfono</label>
    <input type="tel" name="equipo[telefono]" id="telefono" value="<?php echo s($equipo->telefono); ?>">
</div>
<div class="campo">
    <label for="foto">Foto</label>
    <input type="file" name="equipo[foto]" id="foto" accept="image/jpeg, image/png ">
    <?php if ($equipo->imagen): ?>
        <img src="/uploads/images/<?php echo s($equipo->imagen); ?>" class="imagen-small" alt="Imagen Proyecto" title="Imagen Actual">
    <?php endif; ?>
</div>