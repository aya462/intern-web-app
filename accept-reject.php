<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $nomprenom = $_POST['nomprenom'];
    $email = $_POST['email'];
    $datedeb = $_POST['datedeb'];
    $datefin = $_POST['datefin'];
    $departement = $_POST['departement'];

    $stmt = $conn->prepare("INSERT INTO stagiaire_accepte (id, nomprenom, email, datedeb, datefin, departement) VALUES (:id, :nomprenom, :email, :datedeb, :datefin, :departement)");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nomprenom', $nomprenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':datedeb', $datedeb);
    $stmt->bindParam(':datefin', $datefin);
    $stmt->bindParam(':departement', $departement);
    $stmt->execute();

} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>