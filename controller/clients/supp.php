<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suppression de contact</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "../../view/client/ViewContact.php";
  require_once "../../model/clients/ModelContact.php";
  require_once "../../view/clients/ViewTemplate.php";

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

  ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</body>

</html>