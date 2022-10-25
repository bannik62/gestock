<?php
      session_start();

      require_once "/wamp64/www/gestock/view/ViewUser.php";
      require_once "/wamp64/www/gestock/model/ModelUser.php";
      if (isset($_SESSION['id']) && $_SESSION['role'] === 'admin') {
        header('Location: admin.php');
        exit;
      }

      if (isset($_SESSION['id']) && $_SESSION['role'] === 'user') {
        header('Location: accueil.php');
        exit;
      }
      ?>


<!DOCTYPE html>
<html lang="en">

<?php include_once "view/head.php" ?>
<?php include_once "view/navabar.php" ?>


<p class="text-center m-3">Application de Gestion des Stocks et Clients </p>

<div class="container d-flex  justify-content-center  align-content-center flex-wrap m-5">



  <div class="afficheconnection affiche text-center overflow-auto " id="afficheconnection" name="afficheconnection">
    <p class="">affichage connection</p>
    <?php include_once "controller/connexion-user.php" ?>

  </div>


</div>
 <?php include_once "view/footer.php" ?>

</html>