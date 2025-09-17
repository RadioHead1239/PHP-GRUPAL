<?php
require_once '../app/controllers/UsuarioController.php';

$input = json_decode(file_get_contents("php://input"), true);
$correo = $input['correo'] ?? '';
$clave = $input['clave'] ?? '';

$controller = new UsuarioController();
$response = $controller->apiLogin($correo, $clave);

header('Content-Type: application/json');
echo json_encode($response);
