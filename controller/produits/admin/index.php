<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" || $_SESSION['role'] === "directeur" ||$_SESSION['role'] === "superadmin" )) {
?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php require_once "../../../view/headadmin.php" ?>

<body>

<?php   
require_once "../../../view/navadmin.php";
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
<?php } else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-users.php');
  exit;
}?>