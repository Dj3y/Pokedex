<?php
session_start();

include_once("./engine.php");

$id = $_POST["id"];

$stmt = $conn->prepare("SELECT favoris FROM users WHERE username = :username");
$stmt->bindParam(':username', $_SESSION['username']);
$stmt->execute();

$favoris = $stmt->fetchColumn();

// Convertir la chaîne JSON en tableau PHP
$favoris = json_decode($favoris, true);

// Accéder au tableau 'fav' dans le tableau associatif
$array = &$favoris['fav'];

if (!in_array($id, $array, true)) {

    array_push($array, $id);

    // Convertir le tableau PHP en chaîne JSON
    $favoris = json_encode($favoris);

    $stmt = $conn->prepare("UPDATE users SET favoris = :favoris WHERE username = :username");
    $stmt->bindParam(':favoris', $favoris);
    $stmt->bindParam(':username', $_SESSION['username']);
    $stmt->execute();
}
