<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset( $_POST["NomPrenom"], $_POST["mail"], $_POST["DateNaiss"], $_POST["tel"], $_POST["etablissement"], $_POST["typeStage"], $_POST["message"])) {
        $pn = $_POST["NomPrenom"];
        $mail = $_POST["mail"];
        $dat= $_POST["DateNaiss"];
        $num= $_POST["tel"];
        $eta = $_POST["etablissement"];
        $ts=$_POST["typeStage"];
        $msg = $_POST["message"];
        // Vérification si  existe déja
        $stmt = $conn->prepare("SELECT * FROM stagiere WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $rowCount = $stmt->rowCount();

        if ($rowCount > 0) {
            die("<center><b>ID existe déja</b></center>");
        }

        $stmt2 = $conn->prepare("INSERT INTO stagiere(NomPrenom,mail,DateNaiss,tel,etablissement,typeStage,message) VALUES (:NomPrenom, :mail,:DateNaiss,:tel,:etablissement,:typeStage,:message)");
      
        $stmt2->bindParam(':NomPrenom', $pn);
        $stmt2->bindParam(':mail', $mail);
        $stmt2->bindParam(':DateNaiss', $dat);
        $stmt2->bindParam(':tel', $num);
        $stmt2->bindParam(':etablissement', $eta);
        $stmt2->bindParam(':typeStage', $ts);
        $stmt2->bindParam(':message', $msg);

        $result=$stmt2->execute();

        if ($result) {
            echo "<script>alert('demande ajouté avec succées.');</script>";
        } else {
            echo "<center><b>Erreur lors de l'ajout du demande</b></center>";
        }
    }
} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}

include 'welcomesSta.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 50%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 50px;
            color:darkblue;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        input[type="email"],
        input[type="tel"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: vertical;
        }

        .button-group {
            text-align: center;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>


    <div class="container">
        <h1> Demande de Stage</h1>
        <h1> RENSEIGNEZ CES INFORMATIONS</h1>
        <form id="stage-form" method="POST">
       
            <div class="form-group">
                <label for="first-name">Prénom Et Nom</label>
                <input type="text" id="first-name" name="NomPrenom" required>
            </div>
          
            <div class="form-group">
                <label for="birth-date">Date de naissance</label>
                <input type="date" id="birth-date" name="DateNaiss" required>
            </div>
            <div class="form-group">
                <label for="phone-number">Numéro de téléphone</label>
                <input type="tel" id="phone-number" name="tel" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="mail" required>
            </div>
        
            <div class="form-group">
                <label for="school">Établissement</label>
                <input type="text" id="school" name="etablissement" required>
            </div>
            <div class="form-group">
                <label for="stage-type">Type de stage souhaité</label>
                <select id="stage-type" name="typeStage" required>
                    <option value="">-- Sélectionner --</option>
                    <option value="initiation">initiation </option>
                    <option value="technicien">technicien </option>
                    <option value="PFE">PFE</option>
                </select>
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="4" required></textarea>
            </div>
            <div class="button-group">
                <button type="submit" name="send">Envoyer la demande</button>
            </div>
        </form>
    </div>
</body>
</html>