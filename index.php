<?php
header('Content-Type: application/json');

// Obtener el parámetro 'id' de la URL
$id = isset($_GET['id']) ? $_GET['id'] : null;

// Verificar si se recibió un parámetro 'id'
if ($id !== null) {
    // Si se recibió un id, devolver el mensaje correspondiente
    echo json_encode(["message" => "El id del usuario es $id."]);
} else {
    // Si no se recibió un id, devolver la lista de usuarios
    echo json_encode(["message" => "Lista de todos los usuarios."]);
}
?>