<?php
include 'welcomeRes.php';
session_start();

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id) {
  try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("SELECT * FROM listesta WHERE ids = :id AND statut = 'en cours'");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($result);
  } catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
  }
} else {
  echo 'Aucun ID fourni.';
}
?>