<?php
session_start();

if (isset($_SESSION['id']) && $_SESSION['role'] === "admin" || $_SESSION['role']==="directeur" ||$_SESSION['role'] ==="superadmin") {



?>
<!doctype html>
<html lang="fr">
<?php
require_once "../../../view/headadmin.php";
?>
<?php 
require_once "../../../view/user/admin/ViewTemplate.php";
ViewTemplate::menu()

?>

<body>
  
  <?php
require_once "../../../view/user/admin/ViewUser.php";
require_once "../../../view/user/admin/ViewTemplate.php";
require_once "../../../model/user/admin/ModelUser.php";


if (isset($_GET['id'])) {
  if (Modeluser::voirUser($_GET['id'])) {
    ViewUser::voirUser($_GET['id']);
  } else {
    ViewTemplate::alert("danger", "utilisateur inexistant", "liste.php");
  }
} else {
  ViewTemplate::alert("danger", "aucune donnée n'a été transmise");
}


ViewTemplate::footer();
?>
</body>

</html>
<?php } else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  header('Location: connexion-user.php');
  exit;
}?>