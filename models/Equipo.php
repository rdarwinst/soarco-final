<?php

namespace Model;

class Equipo extends ActiveRecord
{

    protected static $columnasDB = ['id', 'nombre', 'apellido', 'cargo', 'correo', 'telefono', 'imagen'];
    protected static $tabla = 'equipo';

    protected static $errores = [];

    public $id;
    public $nombre;
    public $apellido;
    public $cargo;
    public $correo;
    public $telefono;
    public $imagen;
    public $agregado;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->cargo = $args['cargo'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->imagen = $args['foto'] ?? '';
        $this->agregado = '';
    }

    public function validar()
    {

        if (!$this->nombre) {
            self::$errores[] = "La persona debe tener un nombre.";
        }
        if (!$this->apellido) {
            self::$errores[] = "La persona debe tener un apellido.";
        }
        if (!$this->cargo) {
            self::$errores[] = "El cargo es obligatorio.";
        }
        if (!$this->correo) {
            self::$errores[] = "Debes añadir un correo de contacto.";
        }
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $this->correo)) {
            self::$errores[] = "Debes introducir un email válido.";
        }
        if (!$this->telefono) {
            self::$errores[] = "Debes añadir un número de teléfono";
        }

        if (!preg_match('/^(?:\+57|57)?\s?(?:3\d{9}|[1-9]\d{7})$/', $this->telefono)) {
            self::$errores[] = "Debes ingresar un número de teléfono válido.";
        }

        if (!$this->imagen) {
            self::$errores[] = "La foto es obligatoria.";
        }

        return self::$errores;
    }
}
