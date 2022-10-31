<!doctype html>
<html lang="fr">




  <?php
   session_start();
  require_once "../../view/depots/ViewDepot.php";
  require_once "../../model/depots/ModelDepot.php";
  require_once "../../view/depots/ViewTemplate.php";

  ViewTemplate::menu();
  
  if (isset($_GET['id'])) {
    if (ModelDepot::voirDepot($_GET['id'])) {
      if (ModelDepot::suppDepot($_GET['id'])) {
        header('Location: liste.php');
        exit;
      } else {
        ViewTemplate::alert("danger", "erreur de requete", "liste.php");

      }
    } else {
      ViewTemplate::alert("danger", "Depot inexistant");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée na été transmise");

  }

  ViewTemplate::footer();
  ?>


</html>