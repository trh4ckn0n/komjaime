<?php
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);
$email = $data["email"] ?? "";
$password = $data["password"] ?? "";

$users = json_decode(file_get_contents("users.json"), true)["users"];

foreach ($users as $user) {
    if ($user["email"] === $email && $user["password"] === $password) {
        echo json_encode(["success" => true, "message" => "Connexion réussie"]);
        exit;
    }
}

echo json_encode(["success" => false, "message" => "Identifiants incorrects"]);
?>
