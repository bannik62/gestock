<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin") {
  $html = '<h1 class="text-center" ><u>interface administrateur</u></h1>';
  $html .= '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  // header('Location: connexion-DepotlisteDepots.php');
  exit;
}
?>
<!doctype html>
<html lang="fr">

<body>
  <?php require_once "../../../view/headadmin.php "; ?>

  <?php
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>
  <?php
  require_once "../../../view/produits/admin/ViewProduit.php";
  require_once "../../../model/produits/admin/ModelProduit.php";
  require_once "../../../view/produits/admin/ViewTemplate.php";

  if (isset($_POST['ajout'])) {
    if (ModelProduit::ajoutProduit($_POST['nom'], $_POST['type'],  $_POST['photo'], $_POST['description'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    } else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  } else {
    ViewProduit::ajoutProduit();
  }
  ?>
  <?php
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewTemplate::footer()
  ?>

</body>

</html>