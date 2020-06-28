
<?php
    include('navbar.php'); 
        if (!isset($_SESSION['user'])) {
            header("Location: connexion.php");
        }
?>
<html>
    <head>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php 

             $id = $_GET['id']; 
               
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "gestionproduit";
                        // Create connection
                try{

                    $conn = mysqli_connect($servername, $username, $password, $database);
                    //$sq = "INSERT INTO produit(nom,libelle,prix) VALUES ('$Nom',$Libelle,$Prix)";
                
                    $query = $conn->query("SELECT * FROM produit WHERE idP = $id");
                
                    if ($query->num_rows > 0) {

                        $produit = $query->fetch_assoc();
                        echo '<p>Id du produit : '.$produit['idP'].'</p>';
                        echo '<p>Libelle du produit : '.$produit['libelle'].'</p>';
                        echo '<p>Prix du produit : '.$produit['prix'].'</p>';
                        echo '<p>Nom du produit : '.$produit['nom'].'</p>';
                    }

                } catch(PDOExeption $e) {
                    echo "connection failed". $e->getMessage();
                }
         ?>
    </body>
</html>
