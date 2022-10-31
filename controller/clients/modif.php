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

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>