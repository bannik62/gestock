<!DOCTYPE html>
<html lang="fr">
 <?php require_once "../../view/head.php";?>
  <?php require_once "../../view/navabar.php";?>

  <?php
  require_once "../../view/depots/ViewContact.php";
  require_once "../../view/depots/ViewTemplate.php";
  require_once "../../model/depots/ModelContact.php";
 
  


  if (isset($_GET['id'])) {
    if (ModelContact::voirContact($_GET['id'])) {
      ViewContact::modifContact($_GET['id']);
    } else {
      echo "ce contact n'existe pas";
    }
  } else {
    if (isset($_POST['id']) && ModelContact::voirContact($_POST['id'])) {
      if (ModelContact::modifContact($_POST['id'], $_POST['nom'], $_POST['ville'], $_POST['code_post'], $_POST['longi'],$_POST['lat'],$_POST['id'])) {
        ViewTemplate::alert("success", "maj faite avec succes", "admin.php");
      } else {
        ViewTemplate::alert("danger", "échec de la mise à jour", "admin.php");
      }
    } else {
      ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
    }
  }

  ?>
  <?php require_once "../../view/footer.php";?>

