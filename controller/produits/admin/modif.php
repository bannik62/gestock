<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur" || $_SESSION['role'] === "superadmin") {
?>
  <!DOCTYPE html>
  <hmtl>
    <?php
    require_once "../../../view/headadmin.php";
    require_once "../../../view/produits/admin/ViewProduit.php";
    require_once "../../../model/produits/admin/ModelProduit.php"; ?>

    <body>

      <?php require_once "../../../view/produits/admin/ViewTemplate.php";
      ViewTemplate::menu();
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

    </body>

    </html>

  <?php } else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-user.php');
  exit;
} ?>