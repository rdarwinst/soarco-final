<?php

namespace Model;

use Model\ActiveRecord;

class Admin extends ActiveRecord
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id, nombre, apellido, usuario, email, password'];

    public $id;
    public $nombre;
    public $apellido;
    public $usuario;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? null;
        $this->apellido = $args['apellido'] ?? null;
        $this->usuario = $args['usuario'] ?? null;
        $this->email = $args['email'] ?? null;
        $this->password = $args['password'] ?? null;
    }

    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = "¡El Email es obligatorio!";
        }
        if (!$this->password) {
            self::$errores[] = "¡El Password es obligatorio!";
        }
        return self::$errores;
    }

    public function existeUsuario()
    {
        // Revisar si el usuairo existe
        $sql = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";

        $resultado = self::$db->query($sql);

        if (!$resultado->num_rows) {
            self::$errores[] = 'El usuario ingresado no existe';
            return;
        }
        return $resultado;
    }

    public function comprobarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);

        if (!$autenticado) {
            self::$errores[] = 'El password es incorrecto';
        }

        return $autenticado;
    }

    public function autenticar()
    {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
