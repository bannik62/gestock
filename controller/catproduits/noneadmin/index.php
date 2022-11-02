<!doctype html>
<html lang="fr">

<?php require_once "../../../view/headadmin.php";
?>

<body>
<?php   require_once "../../../view/navabar.php";
 ?>
<div class="container list  " style="width:100% ;" >


  <?php
  require_once "../../../view/catproduits/noneadmin/ViewCatProduit.php";
  require_once "../../../view/catProduits/noneadmin/ViewTemplate.php";

  ViewCatProduit::listeCatProduit();
  ?>
</div>
  <?php
  ViewTemplate::footer();
  ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

</body>

</html>