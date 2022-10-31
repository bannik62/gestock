<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin") {
  $html = '<h1 class="text-center" ><u>interface administrateur</u></h1>';
  $html .= '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  // header('Location: connexion-user.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include_once "../../../view/headadmin.php" ?>
<?php include_once "../../../view/navadmin.php" ?>
<?php include_once "../../../view/user/admin/ViewTemplate.php" ?>

<?php
echo $html;
?>

<div>
  <p class="text-center m-3">Application de Gestion des Stocks et Clients </p>
</div>

<?php ViewTemplate::footer();
?>

