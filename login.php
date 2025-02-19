<?php
header("Content-Type: application/json");

// Récupérer les données envoyées par le formulaire
$data = json_decode(file_get_contents("php://input"), true);
$username = $data["username"] ?? "";
$password = $data["password"] ?? "";

// Charger les utilisateurs depuis le fichier JSON
$users = json_decode(file_get_contents("users.json"), true)["users"];

// Vérifier si l'utilisateur existe
foreach ($users as $user) {
    if ($user["username"] === $username && $user["password"] === $password) {
        echo json_encode(["success" => true, "message" => "Connexion réussie"]);
        exit;
    }
}

echo json_encode(["success" => false, "message" => "Identifiants incorrects"]);
?>
