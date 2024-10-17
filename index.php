<?php
header('Content-Type: application/json');

// Lista de usuarios
$usuarios = [
    ["id" => 1, "nombre" => "Roberto"],
    ["id" => 2, "nombre" => "Lia"],
    ["id" => 3, "nombre" => "Heder"]
];

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
?>