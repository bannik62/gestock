
<!doctype html>
<html lang="fr">
<?php require_once "../../../view/headadmin.php" ?>

  <?php
  require_once "../../../view/depots/admin/ViewDepot.php";
  require_once "../../../model/depots/admin/ModelDepot.php";
  require_once "../../../view/depots/admin/ViewTemplate.php";

 
  if(isset($_POST['ajout'])){
  

    if(ModelDepot::ajoutDepot($_POST['id'], $_POST['nom'], $_POST['ville'], $_POST['code_post'],  $_POST['longi'] ,$_POST['lat'] ,$_POST['directeur'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "index.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }

  
  ?>


</html>