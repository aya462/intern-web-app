<?php


include 'welcomesSta.php';


$servername = 'localhost';
$serveruser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    // Sélectionner les données de la table stagiere
    $stmt = $conn->prepare("SELECT * FROM stagiere");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
    catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }

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
            width: 70%;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 80px;
            color:darkblue;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        th {
            background-color: lightblue;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>

<div class="container">
<form method="get" action="modifier_stagiere.php">
    <h1> Les Détails De Votre Demande De Stage</h1>
    <?php if (count($result) > 0): ?>
        <table>
            <thead>
                <tr>
                     <th>ID</th>
                    <th>Nom et Prénom</th>
                    <th>Email</th>
                    <th>Date Naissance</th>
                    <th>téléphone</th>
                    <th>Etablissement</th>
                    <th>type stage  </th>
                    <th>message </th>
                
                </tr>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
            </thead>
            <tbody>
                <?php foreach ($result as $row): ?>
                    <tr>
                          <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['NomPrenom']) ?></td>
                        <td><?= htmlspecialchars($row['mail']) ?></td>
                        <td><?= htmlspecialchars($row['DateNaiss']) ?></td>
                        <td><?= htmlspecialchars($row['tel']) ?></td>
                        <td><?= htmlspecialchars($row['etablissement']) ?></td>
                        <td><?= htmlspecialchars($row['typeStage']) ?></td>
                        <td><?= htmlspecialchars($row['message']) ?></td>
                        <td><a href="modifier_stagiere.php?id=<?= htmlspecialchars($row['id']) ?>"><i class="fas fa-edit"></i></a></td>
                        <td><a href="supprimer_stagiaire.php?id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet demande ?')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
                </form>
    <?php else: ?>
        <p>Aucune demande de stage trouvée.</p>
    <?php endif; ?>
</div>

</body>
</html>
