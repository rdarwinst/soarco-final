<?php

namespace Model;

class ImagenesProyecto extends ActiveRecord
{
    public static $columnasDB =  ['id', 'tipo', 'imagen', 'proyecto_id'];
    public static $tabla = 'imagenes_proyecto';

    public $id;
    public $tipo;
    public $imagen;
    public $proyecto_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->tipo = $args['tipo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->proyecto_id = $args['proyecto_id'] ?? '';
    }

    public function validar()
    {
        if (!$this->tipo) {
            self::$errores[] = "¡Debes seleccionar una categoría!";
        }
        if (!$this->proyecto_id) {
            self::$errores[] = "¡El nombre del proyecto es obligatorio!";
        }
        /*         if(!$this->nombre_imagen) {
            self::$errores[] = "¡Debes seleccionar almenos una imagen!";
        } */

        return self::$errores;
    }

    public function crear()
    {
        $atributos = $this->sanitizarAtributos();

        $sql = "INSERT INTO " . static::$tabla . " (";
        $sql .= join(', ', array_keys($atributos));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($atributos));
        $sql .= "')";

        $resultado = self::$db->query($sql);
        
        return $resultado;
    }

    public static function findByProyectoYTipo($proyecto_id, $tipo)
    {
        $sql = "SELECT * FROM " . static::$tabla . " WHERE proyecto_id = " . self::$db->escape_string($proyecto_id) . " AND tipo = '" . self::$db->escape_string($tipo) . "'";        
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }
}
