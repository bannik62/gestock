<?php
session_start();

if (isset($_SESSION['id'])) {
?>
  <!DOCTYPE html>
  <?php include_once "../../../view/headadmin.php" ?>
  <?php include_once "../../../view/navacueil.php"; ?>

  <div class="container d-flex  justify-content-around align-content-center flex-wrap mt-5">
    <div class="affichacceuil affiche text-center overflow-auto " id="affichacceuil" name="affichacceuil">
      <h1>bienvenue <?= $_SESSION['nom'] ?> dans l'interface de visualisation des stocks </h1>
    </div>
  <?php
} else {
  header('Location: connexion-user.php');
}
  ?>