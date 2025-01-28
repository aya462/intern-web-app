<!DOCTYPE html>
<html lang="en">
<head>
  
</script>
<!DOCTYPE html>

</html>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" type="text/css" href="stylelog.css">
</head>
<body>
  <div class="wrapper">
    <div class="form-wrapper sign-in">
      <form method="POST" action="#">
        <h2>Login Responsable de stage platforme </h2>
        <div class="input-group">
          <input type="text" id="username" name="username" required>
          <label for="" >E-Mail</label>
        </div>
        <div class="input-group">
          <input type="password" id="password" name="password" required>
          <label for="" >Password</label>
        </div>
       
        <button type="submit">Login</button>

        <?php 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $utilisateur_valide = 'responsable@gmail.com';
  $mot_de_passe_valide = 'azerty';
  
  $username = $_POST['username'];
  $password = $_POST['password'];

  if ($username === $utilisateur_valide && $password === $mot_de_passe_valide) {
      // L'utilisateur est authentifié
      $message="connexion reussit";
      echo '<script>alert("' . $message . '");</script>';
      header("Location: welcomeRes.php");
  } else {
      // L'utilisateur n'est pas authentifié
    $message2="Nom d\'utilisateur ou mot de passe incorrect.";
    echo '<script>alert("' . $message2 . '");</script>';
   // echo '<script>window.location.href("logRes.html");</script>';
  }
}
        
        ?>
      </form>
    
  </div>
  
</body>
</html>