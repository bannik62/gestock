<!doctype html>
<html lang="fr">

<?php require_once "../../../view/headadmin.php";
?>

<body>
  <?php require_once "../../../view/catproduits/noneadmin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>
  <div class="container list mb-5 " style="width:100% ;">
    <?php
    require_once "../../../view/catproduits/noneadmin/ViewCatProduit.php";
    require_once "../../../view/catProduits/noneadmin/ViewTemplate.php";

    ViewCatProduit::listeCatProduit();
    ?>
  </div>
</body>

</html>