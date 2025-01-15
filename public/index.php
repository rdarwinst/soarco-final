<?php
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\ProyectoController;
use Controllers\EquipoController;
use Controllers\ImagenController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\TestimonioController;

$router = new Router();

/* Zona Privada */

// Proyectos
$router->get('/admin', [ProyectoController::class, 'index']);
$router->get('/proyectos/crear', [ProyectoController::class, 'crear']);
$router->post('/proyectos/crear', [ProyectoController::class, 'crear']);
$router->get('/proyectos/actualizar', [ProyectoController::class, 'actualizar']);
$router->post('/proyectos/actualizar', [ProyectoController::class, 'actualizar']);
$router->post('/proyectos/eliminar', [ProyectoController::class, 'eliminar']);
$router->get('/imagenes/subir', [ImagenController::class, 'subir']);
$router->post('/imagenes/subir', [ImagenController::class, 'subir']);
$router->post('/testimonios/eliminar', [TestimonioController::class, 'eliminar']);

// Equipo
$router->get('/equipo/crear', [EquipoController::class, 'crear']);
$router->post('/equipo/crear', [EquipoController::class, 'crear']);
$router->get('/equipo/actualizar', [EquipoController::class, 'actualizar']);
$router->post('/equipo/actualizar', [EquipoController::class, 'actualizar']);
$router->post('/equipo/eliminar', [EquipoController::class, 'eliminar']);

/* Zona publica */
$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/proyectos', [PaginasController::class, 'proyectos']);
$router->get('/proyecto', [PaginasController::class, 'proyecto']);
// $router->get('/servicios', [PaginasController::class, 'servicios']);
$router->get('/avaluos', [PaginasController::class, 'avaluos']);
$router->get('/compraventa', [PaginasController::class, 'compraventa']);
$router->get('/gestion', [PaginasController::class, 'gestion']);
$router->get('/deposito', [PaginasController::class, 'deposito']);
$router->get('/servicio-cliente', [PaginasController::class, 'servicioCliente']);
$router->post('/servicio-cliente', [PaginasController::class, 'servicioCliente']);
$router->get('/inversionistas', [PaginasController::class, 'inversionistas']);
$router->get('/testimonios', [PaginasController::class, 'testimonios']);
$router->get('/testimonios/crear', [TestimonioController::class, 'crear']);
$router->post('/testimonios/crear', [TestimonioController::class, 'crear']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

// Login y autenticación
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);

$router->comprobarRutas();
