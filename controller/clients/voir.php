<!doctype html>




  <?php
  require_once "../../view/clients/ViewContact.php";
  require_once "../../view/clients/ViewTemplate.php";

  ViewTemplate::menu();


  if (isset($_GET['id'])) {
    if (ModelContact::voirContact($_GET['id'])) {
      ViewContact::voirContact($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "contact inexistant", "liste.php");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }


  ViewTemplate::footer();
  ?>
