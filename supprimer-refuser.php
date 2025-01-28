<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("DELETE FROM stagiere WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    // Afficher un message de confirmation
    echo "<script>alert('Enregistrement supprimé avec succès.');</script>";

      header('Location: liste_refuser.php');
} catch (PDOException $e) {
    echo '<div class="container"><h1>Erreur</h1><p>Une erreur est survenue lors de la suppression de l\'enregistrement.</p></div>';
}
?>