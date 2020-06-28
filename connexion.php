<?php
session_start();
?>
<html>
	<head>
		<title>Connexion</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<body>
	
		<?php 
			if (isset($_SESSION['error-login'])) {
				echo '<p style="background-color: grey;color: red">'.$_SESSION['error-login'].'</p>';
			}
		 ?>
		<p></p>
		<form action="connexion.php" method="POST">
			<label for="">EMAIL</label>
			<input type="email" placeholder="email" name="email">
			<label for="">Mot de passe</label>
			<input type="text" placeholder="MOT DE PASSE" name="password">
			<button  type="submit" class="btn btn_primary">Se connecter</button>
		</form>
	</body>
</html>

<?php 
		
		if ( isset($_POST['email']) && isset($_POST['password']) )  
		{
			$email = $_POST['email'];
			$passwordUser = $_POST['password'];


			$servername = "localhost";
			$username = "root";
			$password = "";
			$database = "gestionproduit";
				    // Create connection
			try{

				$conn = mysqli_connect($servername, $username, $password, $database);
				//$sq = "INSERT INTO produit(nom,libelle,prix) VALUES ('$Nom',$Libelle,$Prix)";
			
				$query = $conn->query("SELECT * FROM user WHERE mail = '$email' AND password = '$passwordUser'");
				
				if ($query->num_rows > 0) {

					$user = $query->fetch_assoc();

					$_SESSION['user'] = $user;
					header("Location: afficher.php");
				}else{
					$_SESSION['error-login'] = "Email ou mot de passe incorrect";
				
				}

			} catch(PDOExeption $e) {
				echo "connection failed". $e->getMessage();
			}
				
		}
 ?>	
