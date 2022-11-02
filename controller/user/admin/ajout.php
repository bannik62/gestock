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
<?php require_once "../../../view/headadmin.php";
?>

<body>
  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::menu()
  ?>
  <div class="border border-1 border-dark" style="height:500px;" >
  <?php
  require_once "../../../view/user/admin/ViewUser.php";
  require_once "../../../model/user/admin/ModelUser.php";
  require_once "../../../view/user/admin/ViewTemplate.php";

  if (isset($_POST['ajout'])) {
    if (ModelUser::ajoutUser($_POST['nom'], $_POST['prenom'], $_POST['login'],  $_POST['pass'],   $_POST['role'])) {
      ViewTemplate::alert("success", "insertion faite avec succes", "liste.php");
    } else {
      ViewTemplate::alert("danger", "echec de l'insertion", "liste.php");
    }
  } else {
    ViewUser::ajoutUser();
  }
  ?>
</div>


  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::footer()
 ?>
</body>

</html>