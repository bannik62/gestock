<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur" ||$_SESSION['role'] === "superadmin" )) {
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
  require_once "../../../model/produits/admin/Utils.php";
 

  if (isset($_POST['ajout'])) {
    if (ModelProduit::ajoutProduit($_POST['nom'], $_POST['type'],$_FILES["photo"]["name"], $_POST['description'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "index.php");
    } else {
      ViewTemplate::alert("danger", "echec de l'insertion", "index.php");
    }
  } 
    ViewProduit::ajoutProduit();
  
  ?>
  <?php
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewTemplate::footer()
  ?>

</body>

</html>

<?php
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-user.php');
  exit;
}
?>