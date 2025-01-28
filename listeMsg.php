
<?php
	include 'welcomeRes.php';
?>

<!DOCTYPE html>
<html><head>
  <!-- autres balises head -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoJtKh7z7lGz7fuP4F8nfdFvAOA6Gg/z6Y5J6XqqyGXYM2ntX5" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>


       <style>
  body {
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
    background-color: #f2f2f2;
  }
  
  .message-box {
    width: 50%;
    border: 1px solid black;
    padding: 20px;
    margin: 50px auto;
    background-color: #fff;
    box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
  }
  
  th, td {
   
    padding: 15px;
    text-align: left;
  }
  
  th {
    background-color: #f2f2f2;
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
</style>
	</style>
</head>
<body>
	<h1>les messages Récus</h1>
    <div class="message-box">
	<?php
	

		$servername = 'localhost';
		$serveruser = 'root';
		$password = '';
   
		try {
			$conn = new PDO("mysql:host=$servername;dbname=gestion_sta", $serveruser, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		
			$stmt = $conn->prepare("SELECT * FROM contact");
      $stmt->bindParam(':id_s', $id);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
			// Afficher les données dans une table
			echo "<table>";
        
			echo "<tr><th>ID</th><th>Nom</th><th>Email</th><th>Sujet</th><th> Plus de détails</th></tr>";
               // Boucle pour afficher chaque ligne de la table
			foreach ($result as $row) {
        echo "<tr>";
        echo "<td>" . $row['id_s'] . "</td>";
        echo "<td>" . $row['nom'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['sujet'] . "</td>";
        echo "<td><button type='button' class='btn btn-primary detail-btn' data-toggle='modal' data-target='#exampleModal' data-id='" . $row['id_s'] . "'>Détails</button></td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td colspan='5' class='message-details' style='display: none;'>" .
             "<p><strong>De :</strong> " . $row['nom'] . "</p>" .
             "<p><strong>Email :</strong> " . $row['email'] . "</p>" .
             "<p><strong>Sujet :</strong> " . $row['sujet'] . "</p>" .
             "<p><strong>Contenu du Message :</strong> " . $row['message'] . "</p>" .
             "</td>";
        echo "</tr>";
      }
			echo "</table>";
    }
		catch (PDOException $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
	?>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Détails du message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- afficher les détails ici -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
<!-- Script pour afficher les détails du message dans le modal -->
<script>
    $(document).ready(function() {
      $(".detail-btn").click(function() {
        var id = $(this).data("id");
        var messageDetails = $(this).closest("tr").next("tr").find(".message-details");// Récupération de la ligne contenant les détails du message
        $(".modal-body").html(messageDetails.html());// Affichage des détails dans le modal
      });
    });
  </script>
</body>
</html>
