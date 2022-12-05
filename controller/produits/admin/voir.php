<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once "../../../view/headadmin.php";?>

<body>
<?php   require_once "../../../view/navadmin.php"; ?>

  <?php
  require_once "../../../view/produits/admin/ViewProduit.php";
  require_once "../../../view/produits/admin/ViewTemplate.php";

  

  if (isset($_GET['id'])) {
    if (ModelProduit::voirProduit($_GET['id'])) {
      ViewProduit::voirProduit($_GET['id']);
    } else {
      ViewTemplate::alert("danger", "Produit inexistant", "index.php");
    }
  } else {
    ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
  }

  ?>
</body>
<?php
ViewTemplate::footer();
?>

</html>