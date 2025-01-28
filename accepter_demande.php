<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_GET["id"];
    // Sélectionner les données de la table stagiere
    $stmt = $conn->query("UPDATE stagiere SET statut='accepter' WHERE id='$id'");
    session_start();
    $_SESSION["msg"] = "<script>alert('Acceptation avec succès');</script>";
    header('location:afficheliste.php');
    }
    catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    
    
?>