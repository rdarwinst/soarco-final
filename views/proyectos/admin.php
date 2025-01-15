<section class="contenedor seccion">
    <h1>Constructora Soarco SAS</h1>
    <?php

    if ($resultado) {
        $mensaje = mostrarAlertas(intval($resultado));
        if ($mensaje) { ?>
            <p class="alerta exito"><?php echo s($mensaje); ?></p>
    <?php
        }
    }
    ?>

</section>

<section class="contenedor admin-proyectos seccion">
    <h2>Administrar Proyectos</h2>
    <a href="/proyectos/crear" class="boton boton-negro w-sm-100">Agregar Proyecto <i class="fa-solid fa-plus"></i></a>
    <a href="/imagenes/subir" class="boton-negro w-sm-100">Imagenes Proyecto <i class="fa-solid fa-camera"></i></a>
    <div class="contenedor-tabla">
        <table class="proyectos">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Creado el</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($proyectos as $proyecto): ?>
                    <tr>
                        <td><?php echo s($proyecto->id); ?></td>
                        <td><?php echo s($proyecto->titulo); ?></td>
                        <td>
                            <img loading="lazy" width="200" height="300" src="/uploads/images/<?php echo s($proyecto->imagen); ?>" alt="Imagen Portada" class="imagen-tabla">
                        </td>
                        <td><?php echo s($proyecto->fecha); ?></td>
                        <td>
                            <form method="post" class="admin-form" action="/proyectos/eliminar">
                                <input type="hidden" name="id" value="<?php echo s($proyecto->id); ?>">
                                <input type="hidden" name="tipo" value="proyecto">
                                <input type="submit" value="Eliminar" class="boton-eliminar">
                            </form>
                            <a href="/proyectos/actualizar?id=<?php echo s($proyecto->id); ?>" class="boton-actualizar">Actualzar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="contenedor admin-equipo seccion">
    <h2>Administracion del Equipo</h2>
    <a href="/equipo/crear" class="boton boton-negro w-sm-100">Agregar Persona <i class="fa-solid fa-user-plus"></i></a>
    <div class="contenedor-tabla">
        <table class="equipo">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Foto</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona): ?>
                    <tr>
                        <td><?php echo s($persona->nombre) . " " . s($persona->apellido); ?></td>
                        <td><?php echo s($persona->cargo); ?></td>
                        <td><?php echo s($persona->telefono); ?></td>
                        <td><?php echo s($persona->correo); ?></td>
                        <td><img loading="lazy" width="200" height="300" src="/uploads/images/<?php echo s($persona->imagen); ?>" alt="Imagen Persona" class="imagen-tabla"></td>
                        <td>
                            <form method="post" class="admin-form" action="/equipo/eliminar">
                                <input type="hidden" name="id" value="<?php echo s($persona->id); ?>">
                                <input type="hidden" name="tipo" value="equipo">
                                <input type="submit" value="Eliminar" class="boton-eliminar">
                            </form>
                            <a href="/equipo/actualizar?id=<?php echo s($persona->id); ?>" class="boton-actualizar">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<section class="seccion contenedor comentarios">
    <h3>Administrador de Reseñas</h3>
    <div class="contenedor-tabla">
        <table class="comentarios">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Testimonio</th>
                    <th>Escrito el</th>
                    <th>Proyecto</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($testimonios as $testimonio): ?>
                    <tr>
                        <td><?php echo s($testimonio->nombre) . " " . s($testimonio->apellido); ?></td>
                        <td><?php echo s($testimonio->testimonio); ?></td>
                        <td><?php echo s($testimonio->fecha); ?></td>
                        <td><?php echo s($testimonio->proyecto_id); ?></td>
                        <td>
                            <form method="post" class="admin-form" action="/testimonios/eliminar">
                                <input type="hidden" name="id" value="<?php echo s($testimonio->id); ?>">
                                <input type="hidden" name="tipo" value="testimonio">
                                <input type="submit" value="Eliminar" class="boton-eliminar">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>