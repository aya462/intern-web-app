<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
$dbname = 'gestion_sta';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $intern_id = $_POST['intern_id'];
    $evaluation = $_POST['evaluation'];

    $stmt = $conn->prepare("INSERT INTO evaluations (intern_id, evaluation) VALUES (:intern_id, :evaluation)");
    $stmt->bindParam(':intern_id', $intern_id);
    $stmt->bindParam(':evaluation', $evaluation);
    $stmt->execute();

    header('Location: liste_accepter.php');
    exit;
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}?>
