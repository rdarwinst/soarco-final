<?php

namespace Model;

class Testimonial extends ActiveRecord
{
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'imagen', 'testimonio', 'fecha', 'proyecto_id'];

    protected static $tabla = 'testimoniales';

    protected static $errores = [];

    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $testimonio;
    public $fecha;
    public $proyecto_id;
    public $titulo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->imagen = $args['foto'] ?? '';
        $this->testimonio = $args['testimonio'] ?? '';
        $this->fecha = date('Y/m/d');
        $this->proyecto_id = $args['proyecto_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre) {
            self::$errores[] = "Debes añadir tu nombre a esta reseña.";
        }
        if (!$this->apellido) {
            self::$errores[] = "Debes añadir tu apellido a esta reseña.";
        }
        if (!$this->proyecto_id) {
            self::$errores[] = "Debes seleccionar un proyecto para escribir tu reseña.";
        }
        if (strlen($this->testimonio) < 20) {
            self::$errores[] = "La opinión es obligatoria y debe tener al menos 20 caracteres.";
        }
        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una foto.";
        }
        return self::$errores;
    }
}
