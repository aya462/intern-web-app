
<?php
include 'welcomeRes.php';
session_start();
$servername = 'localhost';
$serveruser = 'root';
$password = '';

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    // Sélectionner les données de la table stagiere
    $stmt = $conn->prepare("SELECT * FROM stagiere WHERE statut='refuser'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
    catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qQXab2lo0TjAgN8R4JnH/lGsVzjeg9/WhS/+LXLjHGVhjI0LQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    :root{
  --primary-color: #2e7d32;
  --secondary-color: #333;
  --table-bg-color: #fff;
  --table-border-color: #ddd;
  --table-shadow-color: rgba(0, 0, 0, 0.1);
  --table-header-bg-color: #f5f5f5;
  --table-header-color: #333;
  --table-row-hover-bg-color: #f5f5f5;
  --table-row-hover-color: #333;
}

body{
  font-family: 'Poppins', sans-serif;
  background-color: var(--table-bg-color);
}

.container{
  width: 80%;
  background-color: #fff;
  border-radius: 5px;
  padding: 90px;
  border-radius: 5px;
  margin: 0 auto 2rem;
}

h2{
  text-align: center;
  margin-bottom: 30px;
  color: var(--secondary-color);
  font-family: 'Poppins', sans-serif;
}

table{
  width: 100%;
  border-collapse: collapse;
  border: 1px solid var(--table-border-color);
}

th,
td{
  padding: 15px 20px;
  text-align: left;
  border-bottom: 1px solid var(--table-border-color);
  transition: all 0.3s ease;
}

th{
  background-color: var(--table-header-bg-color);
  color: var(--table-header-color);
  font-weight: normal;
  color:green;
}

tr:nth-child(even){
  background-color: #f2f2f2;
}

tr:hover{
  background-color: var(--table-row-hover-bg-color);
  color: var(--table-row-hover-color);
}

th:hover,
td:hover{
  background-color: var(--primary-color);
  color: #fff;
}

.input-text:focus{
  box-shadow: 0px 0px 0px;
  border-color: var(--primary-color);
  outline: 0;
}

.form-control{
  border: 1px solid var(--primary-color);
}

@media screen and (max-width: 600px){
  table,
  thead{
    display: block;
  }
  
  th,
  td{
    width: 100%;
    display: block;
    margin-bottom: 10px;
  }
  
  th{
    font-weight: bold;
  }
}
    </style>
</head>
<body>
    <div class="container">
        <h2>Liste des stagiaires Réfuser</h2>
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
                    <th>Supprimer ce demande </th>
                
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) { ?>
                    <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                        <td><?= htmlspecialchars($row['NomPrenom']) ?></td>
                        <td><?= htmlspecialchars($row['mail']) ?></td>
                        <td><?= htmlspecialchars($row['DateNaiss']) ?></td>
                        <td><?= htmlspecialchars($row['tel']) ?></td>
                        <td><?= htmlspecialchars($row['etablissement']) ?></td>
                        <td><?= htmlspecialchars($row['typeStage']) ?></td>
                        <td><?= htmlspecialchars($row['message']) ?></td>
            
                       <td><a href="supprimer-refuser.php?id=<?= htmlspecialchars($row['id']) ?>" onclick="return confirm('Voulez-vous vraiment supprimer cet enregistrement ?')"><i class="fas fa-trash"></i></a></td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
    </div>
</body>
</html>