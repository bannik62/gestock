<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Suppression de CatProduit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "../view/catproduits/ViewCatProduit.php";
  require_once "../model/catproduits/ModelCatProduit.php";
  require_once "../view/catproduits/ViewTemplate.php";

  ViewTemplate::menu();
  
  if (isset($_GET['id'])) {
    if (ModelCatProduit::voirCatProduit($_GET['id'])) {
      if (ModelCatProduit::suppCatProduit($_GET['id'])) {
        header('Location: liste.php');
        exit;
      } else {
        ViewTemplate::alert("danger", "erreur de requete", "liste.php");

      }
    } else {
      ViewTemplate::alert("danger", "CatProduit inexistant");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée na été transmise");

  }

  ViewTemplate::footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>