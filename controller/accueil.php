<?php
session_start();
?>

<?php
if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
 <?php include_once "../view/headacueil.php" ?>

   
    <?php include_once "../view/navacueil.php" ?>
    <h1 class="text-center">page d'accueil</h1>

    <div class="container d-flex  justify-content-around align-content-center flex-wrap m-5">

      <div class="affichacceuil affiche text-center overflow-auto " id="affichacceuil" name="affichacceuil">
        <p class="">affichage </p>
        <h1>bienvenu dans l interface magasinier </h1>
      </div>

<?php
} else {
  header('Location: connexion-user.php');
}

?>