<?php

class UsuarioModelo extends Modelo {

    public $id;
    public $ci;
    public $nombre;
    public $password;

    private function prepararAutenticacion() {
        $sql = "Select * from Usuarios where ci = ?";
        $this->sentencia = $this->conexion->prepare($sql);
        $this->sentencia->bind_param('s', $this->ci);
    }
    public function Autenticar()
    {
        $this->prepararAutenticacion();
        $this->sentencia->execute();
        $resultado = $this->sentencia->get_result()->fetch_assoc();
        if ($this->sentencia->error) {
            throw new Exception("Error al obtener el usuario: " . $this->sentencia->error);
        }
        if ($resultado) {
            $comparacion = $this->compararPasswords($resultado['password']);
            if ($comparacion) {
                $this->asignarDatosDeUsuario($resultado);
            } else {
                throw new Exception("Error al iniciar sesion");
            }
        } else throw new Exception("Error al iniciar sesion");
    }

    public function hashearPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function compararPasswords($passwordHasheado) {
        return password_verify($this->password, $passwordHasheado);
    }

    public function asignarDatosDeUsuario($resultado)
    {
        $this->ci = $resultado['ci'];
        $this->id = $resultado['id'];
    }
}
