<?php
include 'welcomeRes.php';
?>
<!DOCTYPE html>
<html>
<head>   
     <style>
        body {
            font-family: 'Josefin Sans', sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 2rem;
            color: #0066cc;
        }

        .container {
            max-width: 1200px;
            margin: 200px auto;
            padding: 2rem;
        }

        .box {
            background-color: #f2f2f2;
            padding: 1.5rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            font-size: 20px;
        }

        th {
            background-color: #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            color: #0066cc;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
<h1>Liste des stagiaires avec rapport</h1>
    <div class="box">
        <table>
            <tr>
                <th>ID</th>
                <th>Nom et prenom</th>
                <th>Date début</th>
                <th>Date fin</th>
                <th>Voir rapport</th>
            </tr>
            <?php
            $servername = 'localhost';
            $serveruser = 'root';
            $password = '';

            try {
                $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $conn->prepare("SELECT id, nom_prenom, datedeb, datefin, name, file_urll FROM files");
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $file) {
                    echo '<tr>' . PHP_EOL;
                    echo '<td>' . $file['id'] . '</td>' . PHP_EOL;
                    echo '<td>' . $file['nom_prenom'] . '</td>' . PHP_EOL;
                    echo '<td>' . $file['datedeb'] . '</td>' . PHP_EOL;
                    echo '<td>' . $file['datefin'] . '</td>' . PHP_EOL;
                    echo '<td><a href="' . $file['file_urll'] . '">' . $file['name'] . '</a></td>' . PHP_EOL;
                    echo '</tr>' . PHP_EOL;
                }
            } catch(PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>