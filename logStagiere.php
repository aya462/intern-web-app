<!DOCTYPE html>
<html lang="en">
<head>
  

<!DOCTYPE html>


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form method="POST" action="#">
        <h2>Login Stagiaire platforme </h2>
        <div class="input-group">
          <input type="text" id="username" name="username" required>
          <label for="" >E-Mail</label>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" required>
          <label for="" >Password</label>
        </div>
       
        <button type="submit">Login</button>
        </form>
    
  
        <?php
        
        $host = "localhost"; // nom d'hôte de la base de données
        $dbname = "gestion_sta"; // nom de la base de données
        $user = "root"; // nom d'utilisateur de la base de données
        $password = ""; // mot de passe de la base de données
        
        try {
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e)
        {
            echo "Erreur : " . $e->getMessage();
        }
        

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $utilisateur_valide = 'eyamohsni01@gmail.com';
    $mot_de_passe_valide = 'azerty';
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $utilisateur_valide && $password === $mot_de_passe_valide) {
        // L'utilisateur est authentifié
        $message="connexion reussit";
        echo '<script>alert("' . $message . '");</script>';
        header("Location: welcomesSta.php");
    } else {
        // L'utilisateur n'est pas authentifié
      $message2="Nom d\'utilisateur ou mot de passe incorrect.";
      echo '<script>alert("' . $message2 . '");</script>';
    }
}

?>
       
      
    
  </div>
  
</body>
</html>