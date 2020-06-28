
<html>
	<head>
		<title>TUTO</title>
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/js_secret.js"></script>
		<style>
			body{background-color:#253;
			}
			li{ color: #fff; 
				}hr {
					border-color:#999;
				}
				h1,h2,h3,h4,h5,h6 {
					color:#fff;
				}
				hr{
					border-color:#999;
				}
				tr,th,td{
					color:#fff;
				}
				input[type="text"], input[type ="email"]{
					background-color: #999; 
				}
				label{
					color:#fff;
				}
			
		</style>

	</head>
	<body>

		
		
		<?php 
			$servername = "localhost";
            $username = "root";
            $password = "";
            $database = "gestionproduit";
                    // Create connection
            try{

                $conn = mysqli_connect($servername, $username, $password, $database);
                //$sq = "INSERT INTO produit(nom,libelle,prix) VALUES ('$Nom',$Libelle,$Prix)";
        

            } catch(PDOExeption $e) {
                echo "connection failed". $e->getMessage();
            }
			if (isset($_GET['id'])) {
				
	             $id = $_GET['id']; 

              
                $query = $conn->query("SELECT * FROM produit WHERE idP = $id");
            
                if ($query->num_rows > 0) {

                    $produit = $query->fetch_assoc();
                }

			}
			if (isset($_POST['id'])) {
				$id = $_POST['id'];
				$nom = $_POST['nom'];
				$libelle = $_POST['libelle'];
				$prix = $_POST['prix'];


	            $sql = "UPDATE produit SET nom='$nom', libelle='$libelle', prix = '$prix' WHERE idP = $id";

				if ($conn->query($sql) === TRUE) {
				    echo "New record created successfully";
				    header("Location: index.php");
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				  
				}
				
			}
            

         ?>

		 
		<div class="container col-md-24">
		<div class="row justify-contet-center">
		<form action="edit.php" method="POST">

			<div class="col-md-8"><br><br>
			<h3 class="text center">MODIFICATION</h3>
				<hr><br>
			</div>

			<input type="hidden" name="id" class="form-control" value="<?php echo isset($produit['idP'])?$produit['idP']:'' ?>">
			<div class="form-group">
			<label>Nom</label>
			<input type="text" name="nom" class="form-control" value="<?php echo isset($produit['nom'])?$produit['nom']:'' ?>">
			</div>
			<div class="form-group">
			<label>Libelle</label>
			<input type="text" name="libelle" class="form-control" value="<?php echo isset($produit['libelle'])?$produit['libelle']:'' ?>">
			</div>
			<div class="form-group">
			<label>Prix</label>
			<input type="number" name="prix" class="form-control" value="<?php echo isset($produit['prix'])?$produit['prix']:'' ?>">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary" name="Enregistre">Enregistre</button>
			</div>
		</form>
		</div>
		</div>
	</body>
</html>