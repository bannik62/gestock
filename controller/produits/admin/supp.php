<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin") {

  '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-DepotlisteDepots.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php require_once "../../../view/headadmin.php" ?>

<body>
  <?php
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewTemplate::menu();
  ?>
  <div class="m-5">
<?php 

  require_once "../../../view/produits/admin/ViewProduit.php";
  require_once "../../../model/produits/admin/ModelProduit.php";
  require_once "../../../view/produits/admin/ViewTemplate.php";
var_dump($_GET['id']);
  if (isset($_GET['id'])) {
    if (ModelProduit::voirProduit($_GET['id'])) {
      if (ModelProduit::suppProduit($_GET['id'])) {
        header('Location: index.php');
        exit;
      } else {
        ViewTemplate::alert("danger", "erreur de requete", "index.php");
      }
    } else {
      ViewTemplate::alert("danger", "Produit inexistant");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée na été transmise");
  }
  ?>
</div>
  <?php
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewTemplate::footer();

  ?>
</body>

</html>