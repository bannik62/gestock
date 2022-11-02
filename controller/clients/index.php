<!doctype html>
<html lang="fr">
<?php require_once "../../view/head.php" ?>
<?php require_once "../../view/navabar.php" ?>

<body>
  <a href="ajout.php" class="btn-lg btn-success">ajouter un client</a>

  <?php
  require_once "../../view/clients/ViewClient.php";
  require_once "../../view/clients/ViewTemplate.php";
  ?>

  <?php
  ViewClient::listeClient();
  ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>