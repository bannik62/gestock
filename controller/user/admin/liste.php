<?php
session_start();

if (isset($_SESSION['id']) && ($_SESSION['role'] === "admin" ||  $_SESSION['role']=== "directeur")) {
  $html = '<h1 class="text-center" ><u>interface administrateur</u></h1>';
  $html .= '<h2 class="text-center" > Bonjour ' . $_SESSION['prenom'] . " " . $_SESSION['nom'] . "<h2>";
} else {
  var_dump($_SESSION['id']);
  var_dump($_SESSION['role']);

  // header('Location: connexion-user.php');
  exit;
}
 
?>
<!doctype html>
<html lang="fr">
<?php require_once "../../../view/headadmin.php"; ?>

<body>
  <?php
  require_once "../../../view/user/admin/ViewTemplate.php";
  ViewTemplate::menu();?>
  <div class="container list " style="width:100% ;">

    <?php
    require_once "../../../view/user/admin/ViewUser.php";
    require_once "../../../view/user/admin/ViewTemplate.php";
    require_once "../../../model/user/admin/ModelUser.php";

    $liste = ModelUser::listeUser();
    ViewUser::listeUser($liste);

    ?>
  </div>
  <?php ViewTemplate::footer(); ?>
</body>

</html>