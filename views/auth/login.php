<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar Sesión</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <form method="post" action="/login">
        <fieldset>
            <legend>Email Y Password</legend>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Ingresa tu email." >
            </div>
            <div class="campo">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" placeholder="Ingresa tu contraseña." >
            </div>
        </fieldset>
        <input type="submit" value="Iniciar Sesión" class="boton-negro-block w-sm-100">
    </form>
</main>