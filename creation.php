
<?php 
		
		session_start();
		if(!isset($_SESSION['user'])){
			header("Location: connexion.html");
		}
?>

<html>
	<head>
		<title>TUTO</title>
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<script src="js/js_secret.js"></script>
		<style>
			body{background-color:#140;
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


		
		

		 
		<div class="container col-md-24">
		<div class="row justify-contet-center">
		<form action="index.php" method="POST">

			<div class="col-md-8"><br><br>
			<h3 class="text center">COMMANDE</h3>
				<hr><br>
			</div>
			<div class="form-group">
			<label>Nom</label>
			<input type="text" name="nom" class="form-control" placeholder="Entre votre nom">
			</div>
			<div class="form-group">
			<label>Libelle</label>
			<input type="text" name="libelle" class="form-control" placeholder="Entre votre demande">
			</div>
			<div class="form-group">
			<label>Prix</label>
			<input type="number" name="prix" class="form-control" placeholder="Entre votre demande">
			</div>
			<div class="form-group">
			<button type="submit" class="btn btn-primary" name="Enregistre">Enregistre</button>
			</div>
			<script>
				 $(document).ready(function(){
                            $('#nom').focus(function(){
                                $(this).css('backgound-color','yellow')
                            });
                            
                    });
			</script>
		</form>
		</div>
		</div>
	</body>
</html>