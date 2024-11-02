<?php
header('Content-Type: application/json');

// Configuración de la base de datos
$host = 'localhost';
$db   = 'practica';
$user = 'root'; // Cambia según tu configuración
$pass = ''; // Cambia según tu configuración

try {
    // Conexión a la base de datos
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Obtener el parámetro 'id' de la URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;

    if ($id !== null) {
        // Consulta para obtener un usuario específico
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario) {
            echo json_encode($usuario);
        } else {
            http_response_code(404);
            echo json_encode(["message" => "Usuario no encontrado"]);
        }
    } else {
        // Consulta para obtener todos los usuarios
        $stmt = $pdo->query("SELECT * FROM usuarios");
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($usuarios);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["message" => "Error de conexión a la base de datos", "error" => $e->getMessage()]);
}
?>
