<main class="contenedor seccion">
    <h1>Actualizar Proyecto</h1>

    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <a href="/admin" class="boton-negro">Volver</a>

    <form class="formulario" method="post" enctype="multipart/form-data">
        <?php include __DIR__ . '/formulario.php'; ?>
        <input type="submit" value="Actualizar Proyecto" class="boton-negro">
    </form>
</main>