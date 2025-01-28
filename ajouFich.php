
<!DOCTYPE html>
<html>
<head>
 <style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f2f2f2;
  }input[type="checkbox"] {
  display: none;
}

input[type="checkbox"] + label {
  display: inline-block;
  position: relative;
  padding-left: 35px;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

input[type="checkbox"] + label:before {
  content: "";
  display: block;
  position: absolute;
  top: 0;
  left: 0;
  width: 20px;
  height: 20px;
  border: 1px solid #ccc;
  background-color: #fff;
  -webkit-transition: .4s;
  transition: .4s;
}

input[type="checkbox"]:checked + label:before {
  content: "✔";
  font-size: 18px;
  color: #007bff;
  text-align: center;
  line-height: 18px;
  background-color: #007bff;
  border: none;
}
        form {
            margin: 100px auto;
            padding: 50px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            border-radius: 10px;
            text-align: center;
            box-sizing: border-box;
        }

        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: lightblue;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 1.2em;
            font-weight: bold;
        }

        input[type="submit"]:hover {
            background-color: blue;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 45px;
            font-family: 'Cairo', sans-serif;
            font-size: 40px;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        label {
            display: block;
            margin-top: 20px;
            font-weight: bold;
        }

        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        
        h1{
            text-align: center;
            color: #007bff;
            margin-top: 45px;
            font-family: 'Cairo', sans-serif;
            font-size: 40px;
            position: relative;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>


<?php
include 'welcomesSta.php';
$servername = 'localhost';
$serveruser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $nom_prenom = isset($_POST["nom"]) ? $_POST["nom"] : '';

    $date_debut = isset($_POST["date_debut"]) ? $_POST["date_debut"] : '';
    $date_fin = isset($_POST["date_fin"]) ? $_POST["date_fin"] : '';

    // Vérification si le fichier a bien été uploadé
    if (!empty($_FILES)) {
  
        $file_name = $_FILES['fichier']['name']; // Nom du fichier
        $file_extension = strrchr($file_name, "."); // Extension du fichier

        $file_tmp_name = $_FILES['fichier']['tmp_name']; // Nom temporaire du fichier

        $file_dest = 'files/' . $file_name; // Chemin de destination du fichier
        $extensions_autorisees = array('.pdf', '.PDF'); // Extensions autorisées

        if (in_array($file_extension, $extensions_autorisees)) {
            // Déplacement du fichier vers le répertoire de destination
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                // Insertion du nom et de l'URL du fichier dans la base de données
                $req = $conn->prepare("INSERT INTO files(nom_prenom,datedeb,datefin,name,file_urll) VALUES(?, ?, ?, ?, ?)");
                $req->execute(array($nom_prenom, $date_debut, $date_fin, $file_name, $file_dest));
                $msg = 'Fichier envoyé avec succés';
                echo '<script>alert("' . $msg . '");</script>';
            } else {
                $msg2 = 'Une erreur est survenue lors de l\'upload du fichier.';
                echo '<script>alert("' . $msg2 . '");</script>';
            }
        } else {
            $msg3 = 'Seul les fichiers PDF sont autorisés';
            echo '<script>alert("' . $msg3 . '");</script>';
        }
    }
}
catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}
?>

    <h1 style="text-align: center; color: #007bff; font-family: 'Cairo', sans-serif; font-size: 30px; position: relative; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3); margin-top: 45px;">Remplir ces données pour envoyer votre rapport</h1>
 
    <form method="POST" enctype="multipart/form-data"><!--charger un fichier-->
       
        
        <label for="nom">Nom et Prénom:</label><br>
        <input type="text" id="nom" name="nom" required><br>

<br>
        <label for="date_debut">Date de début :</label><br>
        <input type="date" id="date_debut" name="date_debut" required><br>

        <label for="date_fin">Date de fin :</label><br>
        <input type="date" id="date_fin" name="date_fin" required><br>
        <label for="date_fin">Envoyer ici votre rapport de stage  :</label><br>
        <input type="file" name="fichier"/> <br> <br>
        <input type="submit" value="Envoyer le fichier" />
    </form>
</body>
</html>