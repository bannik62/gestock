<!doctype html>
<html lang="fr">

<?php require_once "../../../view/headadmin.php";
?>

<body>
  <?php
  require_once "../../../view/catproduits/admin/ViewTemplate.php";
  ViewTemplate::menu();
  ?>
  <div class="container list d-flex justify-content-center " style="width:100% ;">

    <?php
    require_once "../../../view/catProduits/admin/ViewTemplate.php";
    require_once "../../../view/catProduits/admin/ViewCatProduit.php";

    ViewCatProduit::listeCatProduit();
    ?>
  </div>
  <?php
  ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>