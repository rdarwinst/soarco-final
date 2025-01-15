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
                    <input type="text" name="contacto[nombre]" id="nombre">
                </div>
                <div class="campo">
                    <label for="telefono">Teléfono: </label>
                    <input type="tel" name="contacto[telefono]" id="telefono">
                </div>
                <div class="campo">
                    <label for="email">Email: </label>
                    <input type="email" name="contacto[email]" id="email">
                </div>
                <div class="campo">
                    <label for="asunto">Asunto: </label>
                    <input type="text" name="contacto[asunto]" id="asunto">
                </div>
                <div class="campo">
                    <label for="mensaje">Mensaje: </label>
                    <textarea name="contacto[mensaje]" id="mensaje" cols="20" rows="10"></textarea>
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
                        <input type="radio" name="contacto[tipo]" value="cliente" id="cliente">
                    </div>
                    <div class="radio">
                        <label for="inversionista">Inversionista</label>
                        <input type="radio" name="contacto[tipo]" value="inversionista" id="inversionista">
                    </div>
                    <div class="radio">
                        <label for="trabajar">Trabajar</label>
                        <input type="radio" name="contacto[tipo]" value="trabajar" id="trabajar">
                    </div>
                </div>
                <div class="campo">
                    <label for="interes">Servicio de Interés</label>
                    <input list="servicios" name="contacto[servicios]">
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
                <div class="ubicacion">
                    <h4>Ubicación</h4>
                    <div class="icono">
                        <img src="build/img/pin.svg" alt="Icono Ubicación">
                    </div>
                    <p>Direccion de la empresa</p>
                </div>
                <div class="telefono">
                    <h4>Teléfono</h4>
                    <div class="icono">
                        <img src="build/img/telefono.svg" alt="Icono Teléfono">
                    </div>
                    <a href="tel+57311000000" title="Llamar.">311 000 0000</a>
                </div>
                <div class="whatsapp">
                    <h4>WhatsApp</h4>
                    <div class="icono">
                        <img src="build/img/whatsapp.svg" alt="Icono WhatsApp">
                    </div>
                    <a href="wa.me/573111111111" title="Enviar un WhatsApp.">311 111 1111</a>
                </div>
                <div class="email">
                    <h4>Email</h4>
                    <div class="icono">
                        <img src="build/img/email.svg" alt="Icono Email">
                    </div>
                    <a href="mailto:contacto@constructorasoarco.com"
                        title="Enviar un correo.">contacto@constructorasoarco.com</a>
                </div>
            </div>
            <div class="imagen-contacto">
                <picture>
                    <source srcset="build/img/contacto.avif" type="image/avif">
                    <source srcset="build/img/contacto.webp" type="image/webp">
                    <source srcset="build/img/contacto.png" type="image/png">
                    <img loading="lazy" width="200" height="300" src="build/img/contacto.png" alt="Imagen Contacto">
                </picture>
            </div>
        </div>
    </div>
</main>