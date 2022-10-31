<!doctype html>
<html lang="fr">

<?php require_once "../../../view/headadmin.php";
?>

<body>
<?php   require_once "../../../view/navabar.php";
 ?>
<a href="ajout.php" class="btn-lg btn-success">ajouter un utilisateur</a>
<div class="container list d-flex justify-content-center " style="width:100% ;" >

  <?php
  require_once "../../../view/catproduits/admin/ViewCatProduit.php";
  require_once "../../../view/catProduits/admin/ViewTemplate.php";

  ViewCatProduit::listeCatProduit();
  ?>
</div>
  <?php
  ViewTemplate::footer();
  ?>
</body>

</html>