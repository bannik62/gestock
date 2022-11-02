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
<!DOCTYPE html>
<html lang="fr">


<?php
require_once "../../../view/head.php";?>
<html lang="fr">
  <body>
    
    
    <?php
require_once "../../../view/produits/admin/ViewProduit.php";
require_once "../../../view/produits/admin/ViewTemplate.php";
require_once "../../../model/produits/admin/ModelProduit.php";
require_once "../../../view/navabar.php"; 
?>


  
  <?php

if (isset($_GET['id'])) {
      if (ModelProduit::voirProduit($_GET['id'])) {
        ViewProduit::modifProduit($_GET['id']);
      } else {
        echo "ce Produit n'existe pas";
      }
} else {
      if (isset($_POST['id']) && ModelProduit::voirProduit($_POST['id'])) {
        if (ModelProduit::modifProduit($_POST['id'], $_POST['nom'], $_POST['type'], $_POST['photo'], $_POST['description'])) {
          ViewTemplate::alert("success", "maj faite avec succes", "index.php");
        } else {
          ViewTemplate::alert("danger", "échec de la mise à jour", "index.php");
        }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }
}
?>
<?php ViewTemplate::footer() ?>
</body>
</html>