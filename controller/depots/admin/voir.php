<!doctype html>
<html lang="fr">

<?php require_once "../../../view/headadmin.php"?>
<body>
  

  <?php
   session_start();
  require_once "../../../view/depots/admin/ViewDepot.php";
  require_once "../../../view/depots/admin/ViewTemplate.php";
 


  if (isset($_GET['id'])) {
    if (ModelDepot::voirDepot($_GET['id'])) {
      ViewDepot::voirDepot($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "Depot inexistant", "index.php");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }


  ViewTemplate::footer();
  ?>
  </body>
</html>