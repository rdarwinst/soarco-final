<?php

namespace Model;

class Proyecto extends ActiveRecord
{
    protected static $columnasDB = ['id', 'titulo', 'subtitulo', 'imagen', 'generalidades', 'amenidades', 'casas', 'fecha'];
    protected static $tabla = 'proyecto';

    public $id;
    public $titulo;
    public $subtitulo;
    public $imagen;
    public $generalidades;
    public $amenidades;
    public $casas;
    public $fecha;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->subtitulo = $args['subtitulo'] ?? '';
        $this->imagen = $args['portada'] ?? '';
        $this->generalidades = $args['generalidades'] ?? '';
        $this->amenidades = $args['amenidades'] ?? '';
        $this->casas = $args['casas'] ?? '';
        $this->fecha = date('Y/m/d');
    }

    public function validar()
    {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un nombre al proyecto.";
        }
        if (strlen($this->generalidades) < 50) {
            self::$errores[] = "Las generalidades son obligatorias y deben tener al menos 50 caracteres.";
        }

        if (strlen($this->amenidades) < 50) {
            self::$errores[] = "Las amenidades son obligatorias y deben tener al menos 50 caracteres.";
        }

        if (strlen($this->casas) < 50) {
            self::$errores[] = "La información de la casa es obligatoria y debe tener al menos 50 caracteres.";;
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen de portada es importante.";
        }
        return self::$errores;
    }
}
