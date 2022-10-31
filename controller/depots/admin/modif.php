<!DOCTYPE html>
<html lang="fr">
 <?php 
  session_start();
  require_once "../../../view/head.php";?>
  <?php require_once "../../../view/navabar.php";?>

  <?php
  require_once "../../../view/depots/admin/ViewDepot.php";
  require_once "../../../view/depots/admin/ViewTemplate.php";
  require_once "../../../model/depots/admin/ModelDepot.php";

  
;

  if (isset($_GET['id'])) {
    if (ModelDepot::voirDepot($_GET['id'])) {
      ViewDepot::modifDepot($_GET['id']);
    } else {
      echo "ce Depot n'existe pas";
    }
  } else {
    if (isset($_POST['id']) && ModelDepot::voirDepot($_POST['id'])) {
      if (ModelDepot::modifDepot($_POST['id'], $_POST['nom'], $_POST['ville'], $_POST['code_post'], $_POST['longi'],$_POST['lat'],$_SESSION['id'])) {
        ViewTemplate::alert("success", "maj faite avec succes", "index.php");
      } else {
        ViewTemplate::alert("danger", "échec de la mise à jour", "index.php");
      }
    } else {
      ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
    }
  }

  ?>
  <?php require_once "../../../view/footer.php";?>

