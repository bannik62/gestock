<!DOCTYPE html>
<?php 
  require_once "../../view/head.php";
    require_once "../../view/navabar.php";

 ?>
  <?php
  require_once "../../view/clients/ViewContact.php";
  require_once "../../view/clients/ViewTemplate.php";
  require_once "../../model/clients/ModelContact.php";

  ViewTemplate::menu();


  if (isset($_GET['id'])) {
    if (ModelContact::voirContact($_GET['id'])) {
      ViewContact::modifContact($_GET['id']);
    } else {
      echo "ce contact n'existe pas";
    }
  } else {
    if (isset($_POST['id']) && ModelContact::voirContact($_POST['id'])) {
      if (ModelContact::modifContact($_POST['id'], $_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['tel'])) {
        ViewTemplate::alert("success", "maj faite avec succes", "liste.php");
      } else {
        ViewTemplate::alert("danger", "échec de la mise à jour", "../admin.php");
      }
    } else {
      ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
    }
  }


  ViewTemplate::footer();
  ?>

