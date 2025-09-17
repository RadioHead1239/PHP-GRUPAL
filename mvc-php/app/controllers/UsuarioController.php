<?php
require_once 'app/dao/UsuarioDAO.php';

class UsuarioController {
    private $usuarioDAO;

    public function __construct() {
        $this->usuarioDAO = new UsuarioDAO();
    }

    public function login($correo, $clave) {
        $usuario = $this->usuarioDAO->login($correo, $clave);
        if ($usuario) {
            session_start();
            $_SESSION['usuario'] = $usuario;
            if ($usuario['rol'] === 'Administrador') {
                header("Location: /views/usuario/admin.php");
            } else {
                header("Location: /views/usuario/vendedor.php");
            }
        } else {
            header("Location: /views/login.php?error=Credenciales incorrectas");
        }
    }
    public function apiLogin($correo, $clave) {
    $usuario = $this->usuarioDAO->login($correo, $clave);
    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario;

        return [
            "success" => true,
            "rol" => $usuario['rol']
        ];
    } else {
        return [
            "success" => false,
            "message" => "Credenciales incorrectas"
        ];
    }
}

}
