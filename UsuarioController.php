<?php
require_once '../models/Usuario.php';

class UsuarioController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new Usuario();
    }

    public function getUsuarios($id = null) {
        if ($id) {
            $usuario = $this->usuarioModel->getUsuarioById($id);
            if ($usuario) {
                echo json_encode($usuario);
            } else {
                http_response_code(404);
                echo json_encode(['message' => 'Usuario no encontrado']);
            }
        } else {
            $usuarios = $this->usuarioModel->getAllUsuarios();
            echo json_encode($usuarios);
        }
    }
}
?>
