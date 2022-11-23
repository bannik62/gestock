<!DOCTYPE html>
<html lang="fr">
<?php
require_once "../../../view/headadmin.php";
?>

<body>
  <?php
  require_once "../../../view/catproduits/admin/ViewTemplate.php";
  ViewTemplate::menu();
  require_once "../../../view/catproduits/admin/ViewCatProduit.php";
  require_once "../../../model/catproduits/admin/ModelCatProduit.php";

  if (isset($_GET['id'])) {
    if (ModelCatProduit::voirCatProduit($_GET['id'])) {
      ViewCatProduit::modifCatProduit($_GET['id']);
    } else {
      echo "cette categorie n'existe pas";
    }
  } else {
    if (isset($_POST['id']) && ModelCatProduit::voirCatProduit($_POST['id'])) {
      if (ModelCatProduit::modifCatProduit($_POST['id'], $_POST['type'])) {
        ViewTemplate::alert("success", "maj faite avec succes", "liste.php");
      } else {
        ViewTemplate::alert("danger", "échec de la mise à jour", "liste.php");
      }
    } else {
      ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
    }
  } ?>

  <a href="index.php">retour </a>
  <?php
  ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>