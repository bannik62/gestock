
  <?php
  require_once "../../view/depots/ViewContact.php";
  require_once "../../model/depots/ModelContact.php";
  require_once "../../view/depots/ViewTemplate.php";

  ViewTemplate::menu();
  
  if (isset($_GET['id'])) {
    if (ModelContact::voirContact($_GET['id'])) {
      if (ModelContact::suppContact($_GET['id'])) {
        header('Location: liste.php');
        exit;
      } else {
        ViewTemplate::alert("danger", "erreur de requete", "liste.php");

      }
    } else {
      ViewTemplate::alert("danger", "contact inexistant");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée na été transmise");

  }


  ?>
