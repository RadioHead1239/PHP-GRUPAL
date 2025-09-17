<?php
require_once 'app/config/Database.php';

class UsuarioDAO {
    private $db;

    public function __construct() {
        $this->db = Database::conectar();
    }

    public function login($correo, $clave) {
        $sql = "CALL sp_LoginUsuario(:correo, :clave)"; //acá llamamos al procedimiento almacenado
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':clave', $clave);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
