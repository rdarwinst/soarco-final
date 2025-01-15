<?php

namespace Model;

class ActiveRecord
{
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    protected static $errores = [];

    public static function setDB($database)
    {
        self::$db = $database;
    }

    public static function getErrores()
    {
        return self::$errores;
    }

    public function guardar()
    {
        if (!is_null($this->id)) {
            $this->actualizar();
        } else {
            $this->crear();
        }
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

        if ($resultado) {
            header('Location: /admin?resultado=1');
            exit;
        }
    }

    public function eliminar()
    {
        $sql = "DELETE FROM " . static::$tabla . " WHERE id = ";
        $sql .= self::$db->escape_string($this->id);
        $sql .= " LIMIT 1";

        $resultado = self::$db->query($sql);

        if ($resultado) {
            $this->borrarImagen();
            header('Location: /admin?resultado=3');
            exit;
        }
    }

    public function actualizar()
    {
        $atributos = $this->sanitizarAtributos();
        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$tabla . " SET ";
        $sql .= join(', ', $valores);
        $sql .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";

        $resultado = self::$db->query($sql);

        if ($resultado) {
            header('Location: /admin?resultado=2');
            exit;
        }
    }

    public function setImagen($imagen)
    {
        if (!is_null($this->id)) {
            $this->borrarImagen();
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }

    public function borrarImagen()
    {
        $existeArchivo = file_exists(RUTA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(RUTA_IMAGENES . $this->imagen);
        }
    }

    public function atributos()
    {
        $atributos = [];

        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }

        return $atributos;
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }

        return $sanitizado;
    }

    public function validar()
    {
        static::$errores = [];
        return static::$errores;
    }

    public static function all()
    {
        $sql = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

    public static function get($cantidad)
    {
        $sql = "SELECT * FROM " . static::$tabla;
        $sql .= " ORDER BY fecha DESC LIMIT " . $cantidad;
        $resultado = self::consultarSQL($sql);
        return $resultado;
    }

    public static function find($id)
    {
        $sql = "SELECT * FROM " . static::$tabla . " WHERE id = {$id}";
        $resultado = self::consultarSQL($sql);
        return array_shift($resultado);
    }

    public static function consultarSQL($sql)
    {
        $resultado = self::$db->query($sql);
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        $resultado->free();
        return $array;
    }

    public static function crearObjeto($registro)
    {
        $objeto = new static;
        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
