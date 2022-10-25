<!doctype html>
<html lang="fr">

  <?php
  require_once "../../view/depots/ViewContact.php";
  require_once "../../view/depots/ViewTemplate.php";
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</html>