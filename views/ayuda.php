<div class="boton-ayuda">
    <i class="fa-solid fa-circle-question icono-ayuda"></i>
    <span class="tooltip-text">¿Necesitas Ayuda?</span>
</div>

<form action="/ayuda" method="POST" class="form-contactar">
    <span class="btn-cerrar">X</span>
    <div class="contenedor-campos">
        <div class="campo">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="nombre" required>
        </div>
        <div class="campo">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" id="apellido" required>
        </div>
        <div class="campo">
            <label for="email">Correo</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div class="campo">
            <label for="telefono">Teléfono</label>
            <input type="tel" name="telefono" id="telefono" required>
        </div>
    </div>
    <input type="submit" value="Solicitar Ayuda" class="boton-blanco">
</form>