<!DOCTYPE html>
<html lang="fr">
<meta charset=" multipart/form-data">

<?php   require_once "../../view/headacueil.php";
 ?>
<body>
  <?php
  require_once "../../view/navabar.php";
  require_once "../../view/clients/ViewTemplate.php";
    require_once "../../view/clients/ViewClient.php";
require_once "../../model/clients/ModelClient.php";

  if (isset($_GET['id'])) {
    if (ModelClient::voirClient($_GET['id'])) {
      ViewClient::modifClient($_GET['id']);
    } else {
      echo "ce Client n'existe pas";
    }
  } else {
    if (isset($_POST['id']) && ModelClient::voirClient($_POST['id'])) {
      if (ModelClient::modifClient($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'])) {
        ViewTemplate::alert("success", "maj faite avec succes", "liste.php");
      } else {
        ViewTemplate::alert("danger", "échec de la mise à jour", "liste.php");
      }
    } else {
      ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
    }
  }


  ViewTemplate::footer();
  ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</body>

</html>