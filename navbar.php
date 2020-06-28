<?php 
  session_start();
 ?>
 
<nav class="navbar navbar-expand-sm bg-light navbar-light">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">
        <?php 
          if (isset($_SESSION['user'])) {
            echo $_SESSION['user']['mail'];
          }else {
            echo "Se connecter";
          }
        ?>
   
 </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Acceuil</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Insertion</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="deconnexion.php">Deconnexion</a>
    </li>
  </ul>
</nav>

