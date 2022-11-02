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
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php require_once "../../../view/headadmin.php" ?>

<body>

<?php   
require_once "../../../view/produits/admin/ViewTemplate.php";
 ViewTemplate::menu();
?>
  <?php
  require_once "../../../view/produits/admin/ViewProduit.php";
  require_once "../../../view/produits/admin/ViewTemplate.php";
  ViewProduit::listeProduit();
 
   ?>
<?php   
require_once "../../../view/produits/admin/ViewTemplate.php";
 ViewTemplate::footer();
?>
</body>
</html>
