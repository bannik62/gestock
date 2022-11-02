<!doctype html>
<html lang="fr">
<?php require_once "../../../view/headadmin.php";
?>

<body>

  <?php
  require_once "../../../view/catProduits/admin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>

<div class="card d-flex justify-content-center mx-auto m-3 " style="width:500px ;height: 370px;" >
  <?php
  require_once "../../../view/catproduits/admin/ViewCatProduit.php";
  require_once "../../../view/catProduits/admin/ViewTemplate.php";

  if (isset($_POST['ajout'])) {
    if (ModelCatProduit::ajoutCatProduit($_POST['type'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    } else {
      ViewTemplate::alert("danger", "echec de l'insertion", "ajout.php");
    }
  } else {
    ViewCatProduit::ajoutCatProduit();
  }
  ?>
</div>
  <?php ViewTemplate::footer();
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
</body>

</html>