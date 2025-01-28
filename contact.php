
<?php
include 'welcomesSta.php';

?>
<?php
$servername = 'localhost';
$serveruser = 'root';
$password = '';
try {
    $conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo 'Erreur: ' . $e->getMessage();
}


if (isset($_POST["name"], $_POST["email"], $_POST["subject"], $_POST["message"])){
  $nom = $_POST["name"];
  $email = $_POST["email"];
  $sujet = $_POST["subject"];
  $msg= $_POST["message"];


$stmt2 = $conn->prepare("INSERT INTO contact (nom, email, sujet, message) VALUES (:nom, :email, :sujet, :msg)");
$stmt2->bindParam(':nom', $nom);
$stmt2->bindParam(':email', $email);
$stmt2->bindParam(':sujet', $sujet);
$stmt2->bindParam(':msg', $msg);


$result=$stmt2->execute();

if ($result) {
  echo "<script>alert('Message envoyé avec succées.');</script>";
} else {
  echo "<center><b>Erreur lors de l'envoi du message  </b></center>";}
}
?>



<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      background-color: #f2f2f2;
      
    }

    #contactForm {
      width: 400px;
      margin: 60px auto;
      font-size: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      padding: 40px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      background-color: #fff;
      border-radius: 10px;
      transition: transform 0.3s ease-in-out;
    }

    #contactForm:hover {
      transform: translateY(-5px);
      box-shadow: 0 14px 28px rgba(0, 0, 0, 0.2), 0 10px 10px rgba(0, 0, 0, 0.22);
    }

    #contactForm label {
      display: block;
      margin-top: 20px;
      font-weight: bold;
      color: #333;
    }

    #contactForm input[type="text"],
    #contactForm input[type="email"],
    #contactForm textarea {
      width: 100%;
      padding: 12px;
      margin-top: 8px;
      border: none;
      border-radius: 4px;
      box-sizing: border-box;
      font-size: 16px;
      color: #333;
      background-color: #f2f2f2;
    }

    #contactForm textarea {
      height: 150px;
    }

    #contactForm input[type="submit"] {
      width: 100%;
      padding: 12px;
      margin-top: 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    #contactForm input[type="submit"]:hover {
      background-color: #0069d9;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="email"],
    .form-group textarea {
      display: block;
      width: 100%;
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ddd;
      box-sizing: border-box;
      font-size: 16px;
      color: #333;
    }

    .form-group textarea {
      height: 150px;
    }

    
    h1 {
      text-align: center;
      color: #007bff;
      margin-top: 45px;
      font-family: 'Cairo', sans-serif;
      font-size: 48px;
      position: relative;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>
  <h1>Contactez-Nous</h1>
  <form id="contactForm" method="POST">
    <div class="form-group">
      <i class="fas fa-user icon"></i>
      <label for="name">Votre Nom</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <i class="fas fa-envelope icon"></i>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <i class="fas fa-heading icon"></i>
      <label for="subject">Sujet:</label>
      <input type="text" id="subject" name="subject" required>
    </div>
    <div class="form-group">
      <i class="fas fa-comment-dots icon"></i>
      <label for="message">Message:</label>
      <textarea id="message" name="message" required></textarea>
    </div>
    <input type="submit" value="Envoyer">
  </form>

</body>
</html>