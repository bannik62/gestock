<!DOCTYPE html>

<?php
require_once "../../../view/head.php";
require_once "../../../view/navabar.php"; ?>
<html lang="fr">
<?php

require_once "../../../view/produits/admin/ViewProduit.php";
require_once "../../../view/produits/admin/ViewTemplate.php";
require_once "../../../model/produits/admin/ModelProduits.php";


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