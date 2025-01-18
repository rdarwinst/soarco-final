<section class="servicio-cliente seccion">
    <h1>Servicio al Cliente</h1>
    <div class="servicio-cliente-contenido seccion">
        <div class="contenedor mensaje-soporte">
            <p>Estamos aquí para ayudarte con cualquier pregunta o inquietud que puedas tener.
                Para contactarnos, simplemente completa el formulario a continuación con los detalles de tu
                consulta. Nuestro equipo revisará tu mensaje y se pondrá en contacto contigo lo antes posible.
            </p>
            <p>
                Tu satisfacción es nuestra prioridad, y nos aseguraremos de responder a tu solicitud con la mayor
                prontitud.
            </p>
            <p>¡Gracias por tu comprensión y por permitirnos asistirte!</p>
            <p><span>Atentamente: </span>Constructora Soarco SAS.</p>
        </div>
    </div>
</section>

<div class="contenedor seccion">
    <?php
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php } ?>
</div>

<main class="contenedor seccion">
    <form action="/servicio-cliente" class="formulario-asistencia" method="POST">
        <div class="contenedor-campos">
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" placeholder="Ingresa tu nombre." required>
            </div>
            <div class="campo">
                <label for="correo">Correo</label>
                <input type="email" name="email" id="email" placeholder="Ingresa tu correo electrónico." required>
            </div>
            <div class="campo">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Ingresa tu número de teléfono.">
            </div>
            <div class="campo">
                <label for="proyecto">Proyecto</label>
                <input type="text" name="proyecto" id="proyecto" placeholder="Ingresa el nombre del proyecto." required>
            </div>
            <div class="campo">
                <label for="tipo-servicio">Tipo de requerimiento</label>
                <select name="tipo-servicio" id="tipo-servicio" required>
                    <option value="" selected disabled>--Seleccionar--</option>
                    <option value="Peticion">Petición</option>
                    <option value="Queja">Queja</option>
                    <option value="Reclamo">Reclamo</option>
                    <option value="Solicitud">Solicitud</option>
                    <option value="Felicitaciones">Felicitaciones</option>
                </select>
            </div>
            <div class="campo">
                <label for="asunto">Asunto</label>
                <input type="text" name="asunto" id="asunto" placeholder="Ingresa el asunto." required>
            </div>
            <div class="campo">
                <label for="observaciones">Observaciones</label>
                <textarea name="observaciones" id="observaciones" cols="20" rows="10" required></textarea>
            </div>
            <div class="campo">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha">
            </div>
        </div>

        <div class="alinear-derecha">
            <input class="boton-negro w-sm-100" type="submit" value="Solicitar Asistencia">
        </div>
    </form>

</main>