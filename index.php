
<html>
	<head>
		<link rel="stylesheet" href="plugins/bootstrap/4.3.1/css/bootstrap.min.css">
	</head>
	<body>
			
		

		<?php 





		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "gestionproduit";

			try{

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				$query = $conn->query("SELECT * FROM produit");

				if (!$conn) {
						die("Connection failed:" . mysqli_connect_error());
					}
					 if (isset($_POST['nom']) && isset($_POST['libelle']) && isset($_POST['prix'])) {
					 	$nom = $_POST['nom'];
					 	$libelle = $_POST['libelle'];
					 	$prix = $_POST['prix'];
						$sql = "INSERT INTO produit(nom,libelle,prix)VALUES ('$nom', '$libelle','$prix')";
						if (mysqli_query($conn, $sql)) {
						    echo "New record created successfully";
						} else {
						    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
						}
					}
						


						mysqli_close($conn);

					echo "<table>";
					echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>NOM</th>";
					echo "<th>LIBELLE</th>";
					echo "<th>PRIX</th>";
					echo "<th>ACTION</th>";
					echo "<tr>";

				while ($row =$query->fetch_assoc()) {
					echo '<tr>';
					echo '<tr><td>'.$row['idP'].'<td>';
					echo '<td>'.$row['nom'].'<td>';
					echo '<td>'.$row['libelle'].'<td>';
					echo '<td><a href="afficher.php?id='.$row['idP'].'">voir</a><td>';
					echo '<td><a href="edit.php?id='.$row['idP'].'">Editer</a><td>';
					echo '<td><a class="delete" data-id="'.$row["idP"].'" href="#">Delete</a><td>';
					echo '</tr>';
				}
				echo "<table>";


			} catch (PDOExeption $e) {
				echo "connection failed". $e->getMessage();
			}


			?>
		<!-- Button to Open the Modal -->
	<div class="container">
		  <h2>Modal Example</h2>
		  <!-- Button to Open the Modal -->

		  <!-- The Modal -->
		  <div class="modal" id="myModal">
		    <div class="modal-dialog">
		      <div class="modal-content">
		      
		        <!-- Modal Header -->
		        <div class="modal-header">
		          <h4 class="modal-title">Suppression produit</h4>
		          <button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
		          Voulez-vous supprimer ?

		        </div>
		        
		        <!-- Modal footer -->
		        <div class="modal-footer">
		          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
		          <button type="button" class="btn btn-danger">
		       			<a class="confirm-delete" href="edit.php?id=">Delete</a>
		       		</button>
		        </div> 
		      </div>
		    </div>
		  </div>
		  
		</div>

	

	<script type="text/javascript" src="plugins/jquery/3.3.1/jquery.min.js"></script>
	<script type="text/javascript" src="plugins/popper/1.14.7/umd/popper.min.js"></script>
	<script type="text/javascript" src="plugins/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	
	<script type="text/javascript">
		$(document).ready(function(){
			 $(".delete").click(function(){
			 	let idRow = $(this).data('id');
			    $("#myModal").modal("show");
			    $(".confirm-delete").attr('href',"edit.php?id="+idRow);
			  });
		  $("#myModal").on('show.bs.modal', function () {
		    
		  });
		})
	</script>
	
	</body>
</html>