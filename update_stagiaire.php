<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mettre à jour les données du stagiaire
    $id = $_POST['id'];
    $NomPrenom = $_POST['NomPrenom'];
    $DateNaiss = $_POST['DateNaiss'];
    $tel = $_POST['tel'];
    $mail = $_POST['mail'];
    $etablissement = $_POST['etablissement'];
    $typeStage = $_POST['typeStage'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("UPDATE stagiere SET NomPrenom = :NomPrenom, DateNaiss = :DateNaiss, tel = :tel, mail = :mail, etablissement = :etablissement, typeStage = :typeStage, message = :message WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->bindParam(':NomPrenom', $NomPrenom, PDO::PARAM_STR);
    $stmt->bindParam(':DateNaiss', $DateNaiss, PDO::PARAM_STR);
    $stmt->bindParam(':tel', $tel, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
    $stmt->bindParam(':etablissement', $etablissement, PDO::PARAM_STR);
    $stmt->bindParam(':typeStage', $typeStage, PDO::PARAM_STR);
    $stmt->bindParam(':message', $message, PDO::PARAM_STR);
    $stmt->execute();

    header('Location: afficheDemande.php');
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>