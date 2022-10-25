<!doctype html>
<html lang="fr">


  <?php
  require_once "../../view/depots/ViewContact.php";
  require_once "../../model/depots/ModelContact.php";
  require_once "../../view/depots/ViewTemplate.php";

  ViewTemplate::menu();
 
  if(isset($_POST['ajout'])){
    if(ModelContact::ajoutContact($_POST['nom'], $_POST['ville'], $_POST['code_post'],  $_POST['longi'] ,$_POST['lat'],$_POST['longi'] ,$_POST['id'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }
  else {
    ViewContact::ajoutContact();
  }
  
  ViewTemplate::footer();
  ?>


</html>