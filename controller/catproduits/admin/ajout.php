<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ajout de viewCatProduit</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "../../view/catproduits/ViewCatProduit.php";
  require_once "../../model/catProduits/ModelCatProduit.php";
  require_once "../../view/catProduits/ViewTemplate.php";

 
  if(isset($_POST['ajout'])){
    if(ModelCatProduit::ajoutCatProduit($_POST['id'],$_POST['type'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    }
    else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  }
  else {
    ViewCatProduit::ajoutCatProduit();
  }
  
  ViewTemplate::footer();
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>