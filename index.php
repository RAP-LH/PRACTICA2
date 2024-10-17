<?php
header('Content-Type: application/json');

// Datos de usuarios
$usuarios = [
    ["id" => 1, "nombre" => "Roberto"],
    ["id" => 2, "nombre" => "Lia"],
    ["id" => 3, "nombre" => "Heder"]
];

// Obtener el método de la solicitud
$method = $_SERVER['REQUEST_METHOD'];

// Manejar solicitud GET
if ($method == 'GET') {
    // Obtener el parámetro id de la URL
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    
    // Si hay un id, devolvemos el mensaje con el id del usuario
    if ($id) {
        echo json_encode(["mensaje" => "El id del usuario es $id"]);
    } else {
        // Si no hay id, devolvemos solo el ID y el nombre de todos los usuarios
        $usuarios_resumidos = array_map(function($usuario) {
            return ["id" => $usuario["id"], "nombre" => $usuario["nombre"]];
        }, $usuarios);
    
        echo json_encode(["mensaje" => "Lista de todos los usuarios", "usuarios" => $usuarios_resumidos]);
    }
}
// Manejar solicitud POST
elseif ($method == 'POST') {
    // Obtener los datos de la solicitud POST
    $input = json_decode(file_get_contents('php://input'), true);
    $id = isset($input['id']) ? $input['id'] : null;
    
    // Si hay un id, devolvemos el mensaje con el id del usuario
    if ($id) {
        echo json_encode(["mensaje" => "El id del usuario es $id"]);
    } else {
        echo json_encode(["mensaje" => "Datos no recibidos correctamente"]);
    }
}
else {
    echo json_encode(["mensaje" => "Método no soportado"]);
}
?>