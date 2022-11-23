<!doctype html>
<html lang="fr">
<?php  
  require_once "../../../view/headadmin.php";

?>
<body>
  <?php
  require_once "../../../view/catProduits/admin/ViewCatProduit.php";
  require_once "../../../view/catProduits/admin/ViewTemplate.php";
  require_once "../../../model/catProduits/admin/ModelCatProduit.php";

  ViewTemplate::menu();


  if (isset($_GET['id'])) {
    if (ModelCatProduit::voirCatProduit($_GET['id'])) {
      ViewCatProduit::voirCatProduit($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "Catégorie de Produit inexistant", "liste.php");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }


  ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</body>

</html>