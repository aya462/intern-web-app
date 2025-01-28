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
    $stmt = $conn->prepare("SELECT * FROM stagiere WHERE statut='en cours'");
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);}
    catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }?>
    <!DOCTYPE html>
    <html lang="en">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;1,100&display=swap" rel="stylesheet">
    <head>
      
          
        <meta charset="UTF-8">
        
        <style>
                .container {
            width: 75%;
            margin: 50px auto;
            background-color: #fff;
            padding: 90px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
            h2{
            text-align: center;
            margin-bottom: 30px;
            color:darkblue;
            margin-top: 10px;
           
          
            }
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 30px;
                text-align: left;
                border-bottom: 1px solid #ddd;
               
            }
            th {
                background-color: #f2f2f2;
                color:blue;
            }
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            tr:hover {background-color: #ddd;}
     


            .input-text:focus{
                    box-shadow: 0px 0px 0px;
                    border-color:#f8c146;
                    outline: 0px;
                                }

             .form-control {
                    border: 1px solid #f8c146;
                            }

a.btn-accept {
  background-color: green;
  color: white;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  margin-right: 10px;
}

a.btn-accept:hover {
  background-color: darkgreen;
}
a.btn-reject {
  background-color: red;
  color: white;
  padding: 5px 10px;
  border: none;
  border-radius: 5px;
  text-decoration: none;
  display: inline-block;
  margin-right: 10px;
}

a.btn-reject:hover {
  background-color: darkred;
}
        </style>
     
      </head>
    <body>
    
    
</div>
        
        <div class="container">
        <h2>Approuvez les demandes de stage En cours </h2>
        <center>
        <?php 
        if(isset($_SESSION["msg"])){
            echo $_SESSION["msg"]."<br><br>";
            unset($_SESSION["msg"]);
        }
        ?>
        
        </center>
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
                    <th>action</th>

                    
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
                        <td>
                    <a class="btn-accept"  href="accepter_demande.php?id=<?php echo $row['id']; ?>">Accepter</button>
                    <a class="btn-reject" href="refuser_demande.php?id=<?php echo $row['id']; ?>">Rejeter</button>
                       </td>
                      
                    </tr>
                <?php } ?>
            </tbody>
        </table></div>
     
        
    </body>

    </html>