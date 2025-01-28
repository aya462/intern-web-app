<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Sélectionner les données du stagiaire spécifique
    $stmt = $conn->prepare("SELECT * FROM stagiere WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $stagiaire = $stmt->fetch(PDO::FETCH_ASSOC);
}
catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <style>
        body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f2f2f2;
}

.container {
  max-width: 800px;
  margin: 50px auto;
  padding: 20px;
  background-color: #fff;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  margin-bottom: 30px;
  color:blue;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
}

input[type="text"],
input[type="date"],
input[type="tel"],
input[type="email"],
textarea {
  display: block;
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

textarea {
  height: 150px;
}

button[type="submit"] {
  display: block;
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #45a049;
}
    </style>
</head>
<body>
    <div class="container">    
        <h1>Modifier votre Information </h1>
        <?php if ($stagiaire): ?>
            <form action="update_stagiaire.php" method="post">
                <input type="hidden" name="id" value="<?= htmlspecialchars($stagiaire['id']) ?>">
                <label for="NomPrenom">Prénom et Nom:</label>
                <input type="text" id="NomPrenom" name="NomPrenom" value="<?= htmlspecialchars($stagiaire['NomPrenom']) ?>" required><br>
                <label for="DateNaiss">Date de naissance:</label>
                <input type="date" id="DateNaiss" name="DateNaiss" value="<?= htmlspecialchars($stagiaire['DateNaiss']) ?>" required><br>
                <label for="tel">Numéro de téléphone:</label>
                <input type="tel" id="tel" name="tel" value="<?= htmlspecialchars($stagiaire['tel']) ?>" required><br>
                <label for="mail">Adresse e-mail:</label>
                <input type="email" id="mail" name="mail" value="<?= htmlspecialchars($stagiaire['mail']) ?>" required><br>
                <label for="etablissement">Établissement:</label>
                <input type="text" id="etablissement" name="etablissement" value="<?= htmlspecialchars($stagiaire['etablissement']) ?>" required><br>
                <label for="typeStage">Type de stage:</label>
                <input type="text" id="typeStage" name="typeStage" value="<?= htmlspecialchars($stagiaire['typeStage']) ?>" required><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required><?= htmlspecialchars($stagiaire['message']) ?></textarea><br>
                <button type="submit">Mettre à jour</button>
            </form>
        <?php else: ?>
            <p>Aucun stagiaire trouvé.</p>
        <?php endif; ?>
    </div>
</body>
</html>