
<?php 
        session_start();
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
					echo "1";
				}else{
                    echo "2";
				
				}

			} catch(PDOExeption $e) {
				echo "connection failed". $e->getMessage();
			}
				
		}
 ?>	
