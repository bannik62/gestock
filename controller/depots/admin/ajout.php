
<!doctype html>
<html lang="fr">
  
<?php require_once "../../../view/headadmin.php";
session_start() 
?>

<body>
<?php
  require_once "../../../view/depots/admin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>


  <?php
  require_once "../../../view/depots/admin/ViewDepot.php";
  require_once "../../../model/depots/admin/ModelDepot.php";


  if (isset($_POST['ajout'])) {
    if (ModelDepot::ajoutDepot( $_POST['nom'], $_POST['ville'], $_POST['code_post'],  $_POST['longi'], $_POST['lat'], $_POST['directeur'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "index.php");
    } else {
      ViewTemplate::alert("danger", "echec de l'insertion", "index.php");
    }
  }
  else {
    ViewDepot::ajoutDepot();
  }


  ?>
  <?php 
  ViewTemplate::footer()
?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>