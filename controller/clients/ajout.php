<!doctype html>
<html lang="fr">


  <?php
  require_once "../../view/clients/ViewContact.php";
  require_once "../../model/clients/ModelContact.php";
  require_once "../../view/clients/ViewTemplate.php";

  ViewTemplate::menu();
 
  if(isset($_POST['ajout'])){
 

    if(ModelContact::ajoutContact($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    var_dump($_POST['nom']);
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }
  else {
    
    ViewContact::ajoutContact();
  }
  

  ?>
 