<main class="contenedor contacto seccion">
    <h1 class="centrar-texto">Contáctanos</h1>

    <?php
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php } ?>

    <p class="centrar-texto mensaje">Para todas las consultas, envíanos un correo electrónico a traves del
        formilario.</p>
    <div class="contenedor-contacto">
        <form action="/contacto" method="post" class="formulario-contacto seccion">
            <fieldset>
                <legend>Información Personal</legend>
                <div class="campo">
                    <label for="nombre">Nombre: </label>
                    <input type="text" name="contacto[nombre]" id="nombre" required>
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono: </label>
                    <input type="tel" name="contacto[telefono]" id="telefono" required>
                </div>
                <div class="campo">
                    <label for="email">Email: </label>
                    <input type="email" name="contacto[email]" id="email" required>
                </div>
                <div class="campo">
                    <label for="asunto">Asunto: </label>
                    <input type="text" name="contacto[asunto]" id="asunto" required>
                </div>
                <div class="campo">
                    <label for="mensaje">Mensaje: </label>
                    <textarea name="contacto[mensaje]" id="mensaje" cols="20" rows="10" required></textarea>
                </div>
            </fieldset>
            <fieldset>
                <legend>Ubicación</legend>
                <div class="campo">
                    <label for="ubicacion">Departamento: </label>
                    <input type="text" name="contacto[ubicacion]" id="ubicacion">
                </div>
            </fieldset>
            <fieldset>
                <legend>Información Adicional</legend>
                <p>¿Eres Cliente, Inversionista o Deseas Trabajar con Nosotros?</p>
                <div class="contenedor-radios">
                    <div class="radio">
                        <label for="cliente">Cliente</label>
                        <input type="radio" name="contacto[tipo]" value="cliente" id="cliente" required>
                    </div>
                    <div class="radio">
                        <label for="inversionista">Inversionista</label>
                        <input type="radio" name="contacto[tipo]" value="inversionista" id="inversionista" required>
                    </div>
                    <div class="radio">
                        <label for="trabajar">Trabajar</label>
                        <input type="radio" name="contacto[tipo]" value="trabajar" id="trabajar" required>
                    </div>
                </div>
                <div class="campo">
                    <label for="interes">Servicio de Interés</label>
                    <input list="servicios" name="contacto[servicios]" required>
                    <datalist id="servicios">
                        <option value="Avalúos">
                        <option value="Depósito de Propiedades">
                        <option value="Compra / Venta de Inmuebles">
                        <option value="Gestión de Proyectos">
                    </datalist>
                </div>
            </fieldset>
            <input type="submit" value="Contactar" class="boton-negro w-sm-100">
        </form>
        <div class="seccion">
            <div class="info-contacto">
                <div class="landing-page">
                    <h4>Landing Page</h4>
                    <a href="http://www.constructorasoarco.com">www.constructorasoarco.com</a>
                </div>
                <div class="ubicacion">
                    <h4>Ubicación</h4>
                    <p>Carrera 33 No. 29-20 Bogotá</p>
                </div>
                <div class="telefono">
                    <h4>Teléfono</h4>
                    <a href="tel:+573118651819">311 865 1819</a>
                </div>
                <div class="whatsapp">
                    <h4>WhatsApp</h4>
                    <a href="https://wa.link/g62x24" title="Enviar un WhatsApp.">311 865 1819</a>
                </div>
                <div class="email">
                    <h4>Email</h4>
                    <a href="mailto:contacto@constructorasoarco.com"
                        title="Enviar un correo.">contacto@constructorasoarco.com</a>
                </div>
            </div>
            <div class="imagen-contacto">
                <img src="/build/img/contacto.png" alt="Imagen Ilustración Contacto">
            </div>
        </div>
    </div>
</main>